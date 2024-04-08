<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckUserActivity
{
    public function handle(Request $request, Closure $next)
    {
        $maxIdleTime = 1800; // 30 menit dalam detik

        if (Auth::check()) {
            $lastActivity = Auth::user()->last_activity;

            if ($lastActivity && (time() - strtotime($lastActivity)) > $maxIdleTime) {
                Auth::logout();
                return redirect()->route('landing');
            }
        }

        return $next($request);
    }
}
