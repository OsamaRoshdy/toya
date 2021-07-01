<?php


namespace App\Repository;


interface RoleRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function show($role);

    public function edit($role);

    public function update($request, $role);

    public function delete($role);
}
