<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreAdmin;
use App\Http\Requests\Backend\UpdateAdmin;
use App\Models\Admin;
use App\Repository\AdminRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    private AdminRepositoryInterface $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
        parent::__construct('admins');
    }

    public function index()
    {
        return $this->adminRepository->index();
    }

    public function create()
    {
        return $this->adminRepository->create();
    }

    public function store(StoreAdmin $request)
    {
        return $this->adminRepository->save($request);
    }

    public function edit(Admin $admin)
    {
        return $this->adminRepository->edit($admin);
    }

    public function update(UpdateAdmin $request, Admin $admin)
    {
        return $this->adminRepository->update($request, $admin);
    }

    public function destroy(Admin $admin)
    {
        return $this->adminRepository->delete($admin);
    }
}
