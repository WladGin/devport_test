<?php

namespace App\Http\Middleware;

use App\Models\GameToken;
use Closure;
use Illuminate\Http\Request;

class CheckTokenGame
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $token = $request->route()->parameter('token');

        if (empty($token)){
            return redirect()->route('auth.index');
        }

        $issetToken = GameToken::query()
            ->where('token', $token)
            ->where('is_active', true)
            ->whereDate('expires_at', '>', now())
            ->exists();

        if (!$issetToken){
            return redirect()->route('auth.index');
        }

        return $next($request);
    }
}
