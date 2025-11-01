<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Subscription as StripeSubscription;
use Stripe\Customer;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Mail; 
use App\Mail\InvoiceMail;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        // return view('checkout');
        $planId = $request->query('plan_id');
        $planName = $request->query('plan_name');
        $planPrice = $request->query('plan_price');
        $billingType = $request->query('billing_type', 'monthly');

        return view('checkout', compact('planId', 'planName', 'planPrice', 'billingType'));
    }

    // public function charge(Request $request)
    // {
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     try {
    //         $charge = Charge::create([
    //             "amount" => $request->amount * 100, // in cents
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "Test Payment",
    //         ]);
    //         // dd($charge);

    //         return back()->with('success', 'Payment successful!');
    //     } catch (\Exception $e) {
    //         return back()->with('error', $e->getMessage());
    //     }
    // }

    // public function charge(Request $request)
    // {
    // $user = Auth::user();
    // Stripe::setApiKey(config('services.stripe.secret'));

    // try {
    // // 1️⃣ Create Stripe Customer if not already created
    // $customer = Customer::create([
    // 'email' => $user->email,
    // 'name' => $user->name,
    // 'source' => $request->stripeToken,
    // ]);

    // // 2️⃣ Create product & price (or use existing)
    // $product = \Stripe\Product::create([
    // 'name' => $request->plan_name,
    // ]);

    // $interval = $request->billing_type === 'yearly' ? 'year' : 'month';

    // $price = \Stripe\Price::create([
    // 'unit_amount' => $request->amount * 100,
    // 'currency' => 'usd',
    // 'recurring' => ['interval' => $interval],
    // 'product' => $product->id,
    // ]);

    // // 3️⃣ Create subscription
    // $subscription = StripeSubscription::create([
    // 'customer' => $customer->id,
    // 'items' => [['price' => $price->id]],
    // 'expand' => ['latest_invoice.payment_intent'],
    // ]);

    // // 4️⃣ Save in database
    // $validity = $interval === 'year'
    // ? now()->addYear()
    // : now()->addMonth();

    // Subscription::create([
    // 'user_id' => $user->id,
    // 'plan_id' => $request->plan_id,
    // 'stripe_subscription_id' => $subscription->id,
    // 'stripe_customer_id' => $customer->id,
    // 'plan_name' => $request->plan_name,
    // 'billing_type' => $request->billing_type,
    // 'price' => $request->amount,
    // 'is_active' => 'yes',
    // 'validity_till' => $validity,
    // 'next_payment_date' => $validity,
    // ]);

    // return redirect()->route('dashboard')->with('success', 'Subscription activated successfully!');
    // } catch (\Exception $e) {
    // return back()->with('error', $e->getMessage());
    // }
    public function charge(Request $request)
    {
    $user = Auth::user();
    Stripe::setApiKey(config('services.stripe.secret'));

    try {
    // 1️⃣ Create Stripe Customer
    $customer = Customer::create([
    'email' => $user->email,
    'name' => $user->name,
    'source' => $request->stripeToken,
    ]);

    // 2️⃣ Create Product & Price
    $product = \Stripe\Product::create([
    'name' => $request->plan_name,
    ]);

    $interval = strtolower($request->billing_type) === 'yearly' ? 'year' : 'month';

    $price = \Stripe\Price::create([
    'unit_amount' => $request->amount * 100,
    'currency' => 'usd',
    'recurring' => ['interval' => $interval],
    'product' => $product->id,
    ]);

    // 3️⃣ Create Subscription
    $subscription = StripeSubscription::create([
    'customer' => $customer->id,
    'items' => [['price' => $price->id]],
    'expand' => ['latest_invoice.payment_intent'],
    'description' => "Package: {$request->plan_name}, Billing Type: {$request->billing_type}",
    ]);

    // 4️⃣ Retrieve Payment Intent & Invoice
    $paymentIntentId = null;
    $stripeInvoiceId = null;
    $amountPaid = $request->amount;

    if (!empty($subscription->latest_invoice)) {
    $invoice = $subscription->latest_invoice;

    if (is_string($invoice)) {
    $invoice = StripeInvoice::retrieve($invoice);
    }

    $stripeInvoiceId = $invoice->id;

    if (!empty($invoice->payment_intent)) {
    $paymentIntent = is_string($invoice->payment_intent)
    ? PaymentIntent::retrieve($invoice->payment_intent)
    : $invoice->payment_intent;

    $paymentIntentId = $paymentIntent->id;
    }

    $amountPaid = $invoice->amount_paid / 100; // Stripe returns cents
    }

    // 5️⃣ Calculate validity & next payment date
    $validity = $interval === 'year'
    ? now()->addYear()
    : now()->addMonth();

    // 6️⃣ Save subscription in local DB
    $subscriptionModel = Subscription::create([
    'user_id' => $user->id,
    'plan_id' => $request->plan_id,
    'plan_name' => $request->plan_name,
    'billing_type' => ucfirst($request->billing_type),
    'price' => $request->amount,
    'is_active' => 'yes',
    'validity_till' => $validity,
    'next_payment_date' => $validity,
    'stripe_customer_id' => $customer->id,
    'stripe_subscription_id' => $subscription->id,
    'stripe_payment_id' => $paymentIntentId,
    ]);

    // 7️⃣ Save invoice in DB
    if ($stripeInvoiceId) {
    $invoiceModelId = \DB::table('invoices')->insertGetId([
    'user_id' => $user->id,
    'subscription_id' => $subscriptionModel->id,
    'stripe_customer_id' => $customer->id,
    'stripe_invoice_id' => $stripeInvoiceId,
    'stripe_payment_id' => $paymentIntentId,
    'amount' => $amountPaid,
    'status' => $invoice->status ?? 'pending',
    'created_at' => now(),
    'updated_at' => now(),
    ]);

    // 8️⃣ Send invoice email
    $invoiceObj = (object) \DB::table('invoices')->where('id', $invoiceModelId)->first();
    Mail::to($user->email)->send(new InvoiceMail($invoiceObj, $subscriptionModel));
    }

    return redirect()->route('dashboard')
    ->with('success', 'Subscription activated and invoice sent successfully!');

    } catch (\Exception $e) {
    return back()->with('error', $e->getMessage());
    }
    }
}
