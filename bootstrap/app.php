<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request; // ★ [필수] 상단에 이 줄이 꼭 있어야 합니다!

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // 1. 기존 다국어(Locale) 설정 유지
        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
        ]);

        // 2. ★ [추가] 비로그인 사용자 리다이렉트 설정
        $middleware->redirectGuestsTo(function (Request $request) {
            // 접속하려는 주소가 'admin'으로 시작하면 -> 관리자 로그인 페이지로
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }
            
            // 그 외에는 -> 일반 로그인 페이지로
            return route('login');
        });

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();