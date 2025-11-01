<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;

class CheckExpiredSubscriptions
{
    public function handle(Request $request, Closure $next)
    {
        // Get all active subscriptions whose validity_till < today
        $expiredSubscriptions = Subscription::where('is_active', 'yes')
            ->where('validity_till', '<', Carbon::now()->format('Y-m-d'))
            ->get();

        foreach ($expiredSubscriptions as $sub) {
            $sub->update(['is_active' => 'no']);
        }

        return $next($request);
    }
}
