<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

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

        if ($request->fromDate != null && $request->toDate != null) {
            $fromDate = $request->fromDate;
            if (preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $fromDate)) {
                $fromDate = new DateTime($fromDate);
                $toDate = new DateTime();
                $dateDiff = $toDate->diff($fromDate)->format("%a");
                $subscriptionPlan = Auth::user()->type;
                if(config("subscription_plans.$subscriptionPlan.search.availableHistory") >= $dateDiff)
                    return $next($request);
                else {
                    $messageBag = new MessageBag;
                    $messageBag->add(0,__("offer.requestNotCoveredBySubscriptionPlan"));
                    return redirect(route("offer.index"))->with(["errors" => $messageBag]);
                }
            } else return $next($request); #Let controller take care of validation
        } else return $next($request);
    }
}
