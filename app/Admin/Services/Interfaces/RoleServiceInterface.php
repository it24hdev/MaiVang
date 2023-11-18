<?php
namespace App\Admin\Services\Interfaces;

interface RoleServiceInterface
{
    public function store($request);
    public function restore($request);
    public function destroy($request);
    public function destroys($request);
    public function update($request);
    public function show($request);
    public function index($request);
    public function create();
    public function edit($request);
}
