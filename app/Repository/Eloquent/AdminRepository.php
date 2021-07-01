<?php


namespace App\Repository\Eloquent;

use App\Essentials\Traits\ImageTrait;
use App\Essentials\Traits\TableIndex;
use App\Models\Admin;
use App\Repository\AdminRepositoryInterface;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Builder;

class AdminRepository  extends BaseRepository implements AdminRepositoryInterface
{
    use TableIndex;
    use ImageTrait;
    protected Builder $htmlBuilder;

    public function __construct(Admin $model, Builder $htmlBuilder)
    {
        $this->htmlBuilder = $htmlBuilder;
        parent::__construct($model, 'admins');
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->makeDatatable(Admin::all(), $this->module, true,true,
                function ($builder){
                    $builder->editColumn('image', function ($record){
                        return view('layouts.admin.partials.tables.image_column', compact('record'));
                    });
                    return $builder;
                }, ['image']);
        }
        $columns = [
            'name' => ['title' => __('admins.name'), 'searchable' => true, 'orderable' => true],
            'email' => ['title' => __('admins.email'), 'searchable' => true, 'orderable' => true],
            'image' => ['title' => __('main.image'), 'searchable' => true, 'orderable' => true],
            'status' => ['title' => __('main.status'), 'searchable' => true, 'orderable' => true],
        ];
        $html = $this->tableHtmlBuilder($this->htmlBuilder, $columns, true,true);
        return view('backend.shared.datatable', compact('html'))->with(['module' => $this->module]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name');
        return view('backend.' . $this->module . '.create', compact('roles'))->with(['module' => $this->module]);
    }

    public function save($request)
    {
        $data = $request->except(['role_id', 'image']);
        $data['image'] = ImageTrait::storeImage($request->image, $this->module);
        $admin = $this->model->create($data);
        $admin->assignRole($request->role_id);
        toast(__('main.added_successfully'),'success','top-right')->hideCloseButton();
        return redirect()->route('dashboard.' . $this->module . '.index');
    }

    public function edit($admin)
    {
        $roles = Role::pluck('name', 'name');
        return view('backend.' . $this->module . '.edit', compact('admin', 'roles'))->with(['module' => $this->module]);
    }

    public function show($admin)
    {
        $admin = $this->find($admin);
        return view('backend.' . $this->module . '.show', compact('admin'));
    }

    public function delete($admin)
    {
        ImageTrait::deleteImage($admin->image, $this->module);
        $admin->delete();
        toast(__('main.deleted_successfully'),'error','top-right')->hideCloseButton();
        return redirect()->route('dashboard.' . $this->module . '.index');
    }

    public function update($request, $admin)
    {
        $data = $request->except(['role_id', 'image']);
        $data['image'] = ImageTrait::updateImage($request->image, $admin->image,$this->module);
        $admin->update($data);
        $admin->syncRoles($request->role_id);
        toast(__('main.updated_successfully'),'success','top-right')->hideCloseButton();
        return redirect()->route('dashboard.' . $this->module . '.index');
    }
}
