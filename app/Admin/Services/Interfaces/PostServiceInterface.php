<?php
namespace App\Admin\Services\Interfaces;

interface PostServiceInterface
{
    public function index($request);
    public function store($request);
    public function destroy($request);
    public function restore($request);
    public function update($request);
}
