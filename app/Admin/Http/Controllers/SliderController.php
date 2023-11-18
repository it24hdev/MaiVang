<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\SliderRequest;
use App\Admin\Models\Slider;
use App\Admin\Services\Interfaces\SliderServiceInterface;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $slidersService;

    public function __construct(SliderServiceInterface $slidersService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'system']);return $next($request);});
        $this->slidersService = $slidersService;
    }

    public function index(){
        return $this->slidersService->index();
    }

    public function load(){
        return $this->slidersService->load();
    }

    public function store(SliderRequest $request){
        return $this->slidersService->store($request);
    }

    public function edit(Request $request){
        return $this->slidersService->edit($request);
    }

    public function update(SliderRequest $request){
        return $this->slidersService->update($request);
    }

    public function destroy(Request $request){
        return $this->slidersService->destroy($request);
    }
}
