<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        // 🔹 تحقق مما إذا كان المستخدم غير مسجل دخول
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 🔹 تحقق مما إذا كان الدور غير متطابق
        if ($request->user()->role !== $role) {
            // إعادة توجيه المستخدم حسب دوره
            return match ($request->user()->role) {
                'admin' => redirect()->route('admin.home'),
                'employer' => redirect()->route('employer.home'),
                default => redirect()->route('dashboard'),
            };
        }

        return $next($request);
    }
}
