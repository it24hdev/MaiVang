<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\PageRequest;
use App\Admin\Models\Page;
use App\Admin\Services\Interfaces\PageServiceInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $pagesService;

    public function __construct(PageServiceInterface $pagesService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'setting']);return $next($request);});
        $this->pagesService = $pagesService;
    }

    public function index(){
        $this->authorize('viewAny', Page::class);
        return view('admin.content.page.index');
    }

    public function load(){
        return $this->pagesService->load();
    }

    public function store(PageRequest $request){
        $this->authorize('create', Page::class);
        return $this->pagesService->store($request);
    }

    public function edit(Request $request){
        $this->authorize('update', Page::class);
        return $this->pagesService->edit($request);
    }

    public function update(PageRequest $request){
        $this->authorize('update', Page::class);
        return $this->pagesService->update($request);
    }

    public function destroy(Request $request){
        $this->authorize('delete',Page::class);
        return $this->pagesService->destroy($request);
    }
}
