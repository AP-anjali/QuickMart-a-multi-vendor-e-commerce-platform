<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has('customer_session')){
            return $next($request);
        }else{
            session(['showLoginAlert' => true]);
            return redirect('/customer_login_page')->with('alert', 'To access further pages, please login first');
        }
    }
}
