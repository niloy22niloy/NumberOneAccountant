<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('user_id'); // your website's customer
             $table->unsignedBigInteger('subscription_id'); // local subscription ID

             $table->string('stripe_customer_id')->nullable(); // Stripe customer ID
             $table->string('stripe_invoice_id')->nullable(); // Stripe invoice ID
             $table->string('stripe_payment_id')->nullable(); // Stripe PaymentIntent ID

             $table->decimal('amount', 8, 2);
             $table->string('status')->default('pending'); // paid, pending, failed

             $table->timestamps();

             // Foreign keys
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
