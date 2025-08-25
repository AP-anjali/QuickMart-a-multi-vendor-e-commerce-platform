<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class deliveryTeamMemberLogoutAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has('delivery_team_member_session')){
            session(['showDeliveryTeamMemberLogoutAlert' => true]);
            return redirect('/Logout_Error')->with('alert', 'To access further pages, please Logout first');
        }else{
            return $next($request);
        }
    }
}
