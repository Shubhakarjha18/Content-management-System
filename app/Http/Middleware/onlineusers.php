<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\user;
use Auth;
use Cache;
class onlineusers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $expireAt = now()->addMinutes(2);
            Cache::put('user-is-online-'.Auth::id(),true,$expireAt);

            User::where('id',Auth::id())->update(['last_activity' => now()]);
        }
        return $next($request);
    }
}
