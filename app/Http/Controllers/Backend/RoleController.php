<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreRole;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends BaseController
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
        parent::__construct('roles');
    }

    public function index()
    {
        return $this->roleRepository->index();
    }

    public function create()
    {
        return $this->roleRepository->create();
    }

    public function store(StoreRole $request)
    {
        return $this->roleRepository->store($request);
    }

    public function edit(Role $role)
    {
        return $this->roleRepository->edit($role);
    }

    public function update(StoreRole $request, Role $role)
    {
        return $this->roleRepository->update($request, $role);
    }

    public function destroy(Role $role)
    {
        return $this->roleRepository->delete($role);
    }
}
