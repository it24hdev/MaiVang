<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Services\Interfaces\SystemServiceInterface;
use Illuminate\Http\Request;


class SystemController extends Controller
{
    protected $systemsService;

    public function __construct(SystemServiceInterface $systemsService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'system']);return $next($request);});
        $this->systemsService = $systemsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->systemsService->index();
    }

    public function updateProductImageSize(Request $request)
    {
        return $this->systemsService->updateProductImageSize($request);
    }

    public function updatePostImageSize(Request $request)
    {
        return $this->systemsService->updatePostImageSize($request);
    }
}
