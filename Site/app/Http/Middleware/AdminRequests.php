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
        if (!Auth::guard()->guest()) {

            if (Auth::user()->isAdmin) {
                return $next($request);
            } else {
                return redirect('home');
            }
        }
        return redirect()->guest('login');
    }
}