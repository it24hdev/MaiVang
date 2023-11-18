<?php

namespace App\Core\Http\Middleware;

use App\Admin\Http\Helpers\Common;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;

class System
{
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
