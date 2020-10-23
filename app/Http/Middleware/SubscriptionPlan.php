<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->type == "user") {
            if ($request->fromDate != null && $request->toDate != null) {
                $fromDate = $request->fromDate;
                if (preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $fromDate)) {
                    $fromDate = new DateTime($fromDate);
                    $toDate = new DateTime();
                    $dateDiff = $toDate->diff($fromDate)->format("%a");;
                    if(config("subscription_plans.free.historicalAccess") >= $dateDiff)
                        return $next($request);
                    else return redirect(route("app")); #Not eligible
                } else return $next($request); #Let controller take care of validation
            } else return $next($request);
        }else return $next($request);
    }
}
