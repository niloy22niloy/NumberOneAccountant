<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function charge(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                "amount" => $request->amount * 100, // in cents
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test Payment",
            ]);
            // dd($charge);

            return back()->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
