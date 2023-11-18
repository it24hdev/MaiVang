<?php
namespace App\Admin\Services\Interfaces;

interface UserServiceInterface
{

    public function index($request);
    public function create();
    public function store($request);
    public function edit($request);
    public function update($request);
    public function restore($request);
    public function destroy($request);
    public function destroys($request);
}
