<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeesAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has('employee_session')){
            return $next($request);
        }else{
            session(['showLoginAlert' => true]);
            return redirect('/employee_login_page_first_step')->with('alert', 'To access further pages, please login first');
        }
    }
}
