<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @pUser $user ,aram  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth('sanctum')->check())
        {
            if(auth('sanctum')->user()->isAdmin())
            {
                return $next($request);
            }
        }

        return response()->json([
            "message" => "Unauthorized."
        ], 401);
    }
}
