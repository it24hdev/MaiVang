<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\ShortUrlRequest;
use App\Admin\Models\ShortUrl;
use App\Admin\Services\Interfaces\ShortUrlServiceInterface;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    protected $shortUrlService;

    public function __construct(ShortUrlServiceInterface $shortUrlService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'product']);return $next($request);});
        $this->shortUrlService = $shortUrlService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', ShortUrl::class);
        return $this->shortUrlService->index($request);
    }

    public function edit(Request $request)
    {
        $this->authorize('update', ShortUrl::class);
        return $this->shortUrlService->edit($request);
    }

    public function update(ShortUrlRequest $request)
    {
        $this->authorize('update', ShortUrl::class);
        return $this->shortUrlService->update($request);
    }
}
