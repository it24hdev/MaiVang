<?php

namespace App\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class Locale
{
    public function handle(Request $request, Closure $next)
    {
        $language = Session::get('website_language', config('app.locale'));
        // Lấy dữ liệu lưu trong Session, không có thì trả về default lấy trong config

        config(['app.locale' => $language]);
        // Chuyển ứng dụng sang ngôn ngữ được chọn

        return $next($request);
    }
}
