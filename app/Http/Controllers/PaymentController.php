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
use Stripe\Invoice as StripeInvoice;

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
    // $user = Auth::user();
    // Stripe::setApiKey(config('services.stripe.secret'));

    // try {
    // // 1️⃣ Create Stripe Customer
    // $customer = Customer::create([
    // 'email' => $user->email,
    // 'name' => $user->name,
    // 'source' => $request->stripeToken,
    // ]);

    // // 2️⃣ Create Product & Price in Stripe
    // $product = \Stripe\Product::create(['name' => $request->plan_name]);

    // // Normalize billing type and interval
    // $billingInput = strtolower($request->billing_type);
    // if ($billingInput === 'annually') {
    // $billingType = 'yearly';
    // $interval = 'year';
    // } else {
    // $billingType = 'monthly';
    // $interval = 'month';
    // }

    // $price = \Stripe\Price::create([
    // 'unit_amount' => $request->amount * 100,
    // 'currency' => 'usd',
    // 'recurring' => ['interval' => $interval],
    // 'product' => $product->id,
    // ]);

    // // 3️⃣ Create Stripe Subscription
    // $subscription = StripeSubscription::create([
    // 'customer' => $customer->id,
    // 'items' => [['price' => $price->id]],
    // 'expand' => ['latest_invoice.payment_intent'],
    // 'description' => "Package: {$request->plan_name}, Billing Type: {$billingType}",
    // ]);

    // // 4️⃣ Retrieve Payment Intent & Invoice
    // $invoice = $subscription->latest_invoice;
    // if (is_string($invoice)) {
    // $invoice = StripeInvoice::retrieve($invoice);
    // }

    // $stripeInvoiceId = $invoice->id ?? null;
    // $paymentIntentId = $invoice->payment_intent->id ?? null;
    // $amountPaid = $invoice->amount_paid ? $invoice->amount_paid / 100 : $request->amount;

    // // 5️⃣ Calculate validity & next payment date
    // $validity = $interval === 'year' ? now()->addYear() : now()->addMonth();

    // // 6️⃣ Save subscription in local DB
    // $subscriptionModel = Subscription::create([
    // 'user_id' => $user->id,
    // 'plan_id' => $request->plan_id,
    // 'plan_name' => $request->plan_name,
    // 'billing_type' => $billingType,
    // 'price' => $request->amount,
    // 'is_active' => 'yes',
    // 'validity_till' => $validity,
    // 'next_payment_date' => $validity,
    // 'stripe_customer_id' => $customer->id,
    // 'stripe_subscription_id' => $subscription->id,
    // 'stripe_payment_id' => $paymentIntentId,
    // ]);

    // // 7️⃣ Save invoice in DB if exists
    // if ($stripeInvoiceId) {
    // $invoiceModelId = \DB::table('invoices')->insertGetId([
    // 'user_id' => $user->id,
    // 'subscription_id' => $subscriptionModel->id,
    // 'stripe_customer_id' => $customer->id,
    // 'stripe_invoice_id' => $stripeInvoiceId,
    // 'stripe_payment_id' => $paymentIntentId,
    // 'amount' => $amountPaid,
    // 'status' => $invoice->status ?? 'pending',
    // 'created_at' => now(),
    // 'updated_at' => now(),
    // ]);

    // // Send invoice email
    // $invoiceObj = \DB::table('invoices')->where('id', $invoiceModelId)->first();
    // Mail::to($user->email)->send(new InvoiceMail($invoiceObj, $subscriptionModel));
    // }

    // return redirect()->route('dashboard')
    // ->with('success', 'Subscription activated and invoice sent successfully!');

    // } catch (\Exception $e) {
    // return back()->with('error', $e->getMessage());
    // }
    // }

    public function charge(Request $request)
    {
        $user = Auth::user();
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // 1️⃣ Create Stripe Customer (only first-time payment)
            $customer = Customer::create([
                'email' => $user->email,
                'name' => $user->name,
                'source' => $request->stripeToken, // optional
            ]);

            // 2️⃣ Determine billing interval
            $interval = $request->billing_type === 'annually' ? 'year' : 'month';
            $billingType = $request->billing_type === 'annually' ? 'yearly' : 'monthly';

            // 3️⃣ Create Product & Price in Stripe
            $product = \Stripe\Product::create(['name' => $request->plan_name]);

            $price = \Stripe\Price::create([
                'unit_amount' => $request->amount * 100, // cents
                'currency' => 'usd',
                'recurring' => ['interval' => $interval],
                'product' => $product->id,
            ]);

            // 4️⃣ Create Stripe Subscription
            $subscription = StripeSubscription::create([
                'customer' => $customer->id,
                'items' => [['price' => $price->id]],
                'expand' => ['latest_invoice.payment_intent'], // expand PaymentIntent for 3D Secure
                'description' => "Package: {$request->plan_name}, Billing Type: {$billingType}",
            ]);

            // 5️⃣ Retrieve latest invoice & payment intent
            $invoice = $subscription->latest_invoice;
            $paymentIntent = $invoice->payment_intent;

            $invoiceStatus = $invoice->status; // 'paid', 'open', etc.
            $paymentStatus = $paymentIntent ? $paymentIntent->status : null; // 'succeeded', 'requires_action', etc.
            $amountPaid = $invoice->amount_paid ? $invoice->amount_paid / 100 : $request->amount;
            $paymentIntentId = $paymentIntent->id ?? null;

            // 6️⃣ Determine subscription activation & validity
            $isPaid = $invoiceStatus === 'paid' || $paymentStatus === 'succeeded';
            $isActive = $isPaid ? 'yes' : 'no';
            $dbPaymentStatus = $isPaid ? 'success' : 'failed';
            $validity = $isPaid ? ($interval === 'year' ? now()->addYear() : now()->addMonth()) : null;
            $nextPaymentDate = $validity;

            // 7️⃣ Save Subscription in DB
            $subscriptionModel = Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $request->plan_id,
                'plan_name' => $request->plan_name,
                'billing_type' => $billingType,
                'price' => $request->amount,
                'is_active' => $isActive,
                'payment_status' => $dbPaymentStatus,
                'validity_till' => $validity,
                'next_payment_date' => $nextPaymentDate,
                'stripe_customer_id' => $customer->id,
                'stripe_subscription_id' => $subscription->id,
                'stripe_payment_id' => $paymentIntentId,
            ]);

            // 8️⃣ Save Invoice in DB
            if ($invoice->id) {
                \DB::table('invoices')->insert([
                    'user_id' => $user->id,
                    'subscription_id' => $subscriptionModel->id,
                    'stripe_customer_id' => $customer->id,
                    'stripe_invoice_id' => $invoice->id,
                    'stripe_payment_id' => $paymentIntentId,
                    'amount' => $amountPaid,
                    'status' => $invoiceStatus,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // 9️⃣ Handle 3D Secure / requires_action
            if ($paymentStatus === 'requires_action') {
                return redirect()->route('dashboard')->with('info', 'Payment requires authentication (3D Secure). Please complete it
   from Stripe.');
            }

            // 10️⃣ Redirect with proper message
            if ($isPaid) {
                return redirect()->route('dashboard')->with('success', 'Subscription activated successfully!');
            } else {
                return redirect()->route('dashboard')->with('error', 'Payment failed or pending. Please check your payment method.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Stripe error: ' . $e->getMessage());
        }
    }
}
