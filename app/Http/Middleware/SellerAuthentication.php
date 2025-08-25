<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has('seller_session')){
            return $next($request);
        }else{
            session(['showSellerLoginAlert' => true]);
            return redirect('/seller_login_page')->with('alert', 'To access further pages, please login first');
        }
    }
}
