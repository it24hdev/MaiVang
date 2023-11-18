<?php
namespace App\Admin\Services\Interfaces;

interface PostCategoryServiceInterface
{
    public function index();
    public function load();
    public function updateLocation($request);
    public function store($request);
    public function edit($request);
    public function update($request);
}
