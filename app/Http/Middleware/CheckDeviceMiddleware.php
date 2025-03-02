<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDeviceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = session()->getId();
        $lastSessionId = $request->user()->last_session_id;
        if ($sessionId != $lastSessionId) {
            Auth::logout();
            return redirect()->route('auth.login');
        }
        return $next($request);
    }
}