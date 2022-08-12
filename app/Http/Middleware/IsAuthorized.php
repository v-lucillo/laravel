<?php

namespace App\Http\Middleware;

use Closure;

class IsAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session("user")) {
            return redirect()->route('sign_in')->with([
                "message" => "Unauthorized access is prohibited"
            ]);
        }
        return $next($request);
    }
}
