<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\PostCategoryRequest;
use App\Admin\Models\PostCategory;
use App\Admin\Services\Interfaces\PostCategoryServiceInterface;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    protected $categoryPostsService;

    public function __construct(PostCategoryServiceInterface $categoryPostsService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'post']);return $next($request);});
        $this->categoryPostsService = $categoryPostsService;
    }

    public function index(){
        $this->authorize('viewAny', PostCategory::class);
        return $this->categoryPostsService->index();
    }

    public function load(){
        return $this->categoryPostsService->load();
    }

    public function updateLocation(Request $request){
        $this->authorize('update', PostCategory::class);
        return $this->categoryPostsService->updateLocation($request);
    }

    public function store(PostCategoryRequest $request){
        $this->authorize('create', PostCategory::class);
        return $this->categoryPostsService->store($request);
    }

    public function edit(Request $request){
        $this->authorize('update', PostCategory::class);
        return $this->categoryPostsService->edit($request);
    }

    public function update(PostCategoryRequest $request){
        $this->authorize('update', PostCategory::class);
        return $this->categoryPostsService->update($request);
    }

    public function destroy(Request $request){
        $this->authorize('delete', PostCategory::class);
        return $this->categoryPostsService->destroy($request);
    }
}
