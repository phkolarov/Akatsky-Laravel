<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 22.7.2016 г.
 * Time: 15:46 ч.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRequests
{

    public function handle($request, Closure $next, $guard = null)
    {
        var_dump(Auth::user()->isAdmin);

        if (!Auth::guest() && !Auth::user()->isAdmin) {
            return redirect()->guest('login');
        }
        return $next($request);
    }
}