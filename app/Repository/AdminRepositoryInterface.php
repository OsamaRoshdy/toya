<?php


namespace App\Repository;


use App\Http\Requests\Backend\StoreAdmin;

interface AdminRepositoryInterface
{
    public function index();

    public function create();

    public function edit($admin);

    public function save($request);

    public function update($request, $admin);

    public function show($admin);

    public function delete($admin);
}
