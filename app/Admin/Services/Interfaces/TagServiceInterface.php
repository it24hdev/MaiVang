<?php
namespace App\Admin\Services\Interfaces;

interface TagServiceInterface
{
    public function index();
    public function load($request);
    public function store($request);
    public function destroy($request);
    public function edit($request);
    public function update($request);
}
