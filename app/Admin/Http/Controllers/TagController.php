<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\TagRequest;
use App\Admin\Models\Tag;
use App\Admin\Services\Interfaces\TagServiceInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagsService;

    public function __construct(TagServiceInterface $tagsService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['module_active' => 'system']);return $next($request);});
        $this->tagsService = $tagsService;
    }

    public function index()
    {
        $this->authorize('viewAny', Tag::class);
        return $this->tagsService->index();
    }

    public function load(Request $request)
    {
        return $this->tagsService->load($request);
    }

    public function store(TagRequest $request)
    {
        $this->authorize('create', Tag::class);
        return $this->tagsService->store($request);
    }

    public function edit(Request $request)
    {
        $this->authorize('update', Tag::class);
        return $this->tagsService->edit($request);
    }

    public function update(TagRequest $request)
    {
        $this->authorize('update', Tag::class);
        return $this->tagsService->update($request);
    }

    public function destroy(Request $request)
    {
        $this->authorize('delete', Tag::class);
        return $this->tagsService->destroy($request);
    }
}
