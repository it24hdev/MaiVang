<?php
namespace App\Admin\Services\Interfaces;

interface SliderServiceInterface
{
    public function index();
    public function load();
    public function store($request);
}
