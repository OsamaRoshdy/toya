<?php


namespace App\Repository\Eloquent;


use App\Essentials\Traits\TableIndex;
use App\Repository\RoleRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Builder;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    use TableIndex;
    protected Builder $htmlBuilder;

    public function __construct(Role $model, Builder $htmlBuilder)
    {
        $this->htmlBuilder = $htmlBuilder;
        parent::__construct($model, 'roles');
    }
    public function index()
    {
        if (request()->ajax()) {
            return $this->makeDatatable(Role::all(), $this->module, true,true);
        }
        $columns = [
            'id' => ['title' => __('main.id'), 'searchable' => true, 'orderable' => true],
            'name' => ['title' => __('admins.name'), 'searchable' => true, 'orderable' => true],
            'status' => ['title' => __('main.status'), 'searchable' => true, 'orderable' => true],
        ];
        $html = $this->tableHtmlBuilder($this->htmlBuilder, $columns, true,true);
        return view('backend.shared.datatable', compact('html'))->with(['module' => $this->module]);
    }

    public function create()
    {
        $permissions = [];
        foreach (Permission::pluck('name') as $permission) {
            $permission =  explode('_',$permission);
            $permissions[$permission[1]][] = $permission[0];
        }
        return view('backend.' . $this->module . '.create', compact('permissions'))->with(['module' => $this->module]);
    }

    public function store($request)
    {
        $role = Role::create(['name' =>$request->name, 'guard_name' => 'admin', 'status' => $request->status]);
        $role->syncPermissions($request->permissions);
        toast(__('main.added_successfully'),'success','top-right')->hideCloseButton();
        return redirect()->route('dashboard.' . $this->module . '.index');
    }

    public function show($role)
    {
        return view('backend.' . $this->module . '.edit', compact('role'))->with(['module' => $this->module]);
    }

    public function edit($role)
    {
        $permissions = [];
        foreach (Permission::pluck('name') as $permission) {
            $permission =  explode('_',$permission);
            $permissions[$permission[1]][] = $permission[0];
        }
        return view('backend.' . $this->module . '.edit', compact('role', 'permissions'))->with(['module' => $this->module]);
    }

    public function update($request, $role)
    {
        $role->update(['name' =>$request->name, 'status' => $request->status]);
        $role->syncPermissions($request->permissions);
        toast(__('main.updated_successfully'),'success','top-right')->hideCloseButton();
        return redirect()->route('dashboard.' . $this->module . '.index');
    }

    public function delete($role)
    {
        $role->delete();
        toast(__('main.deleted_successfully'),'error','top-right')->hideCloseButton();
        return redirect()->route('dashboard.' . $this->module . '.index');
    }
}
