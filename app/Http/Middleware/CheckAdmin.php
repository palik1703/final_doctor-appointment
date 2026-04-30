<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, что пользователь авторизован и его роль == admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Если не админ — выдаем ошибку доступа
        abort(403, 'Доступ запрещен. Вы не являетесь администратором.');
    }
}