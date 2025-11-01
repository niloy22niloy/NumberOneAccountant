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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
              $table->foreignId('user_id')->constrained()->onDelete('cascade');
              $table->string('plan_id'); // local DB plan id (your plan)
              $table->string('stripe_subscription_id')->nullable();
              $table->string('stripe_payment_id')->nullable();
              $table->string('stripe_customer_id')->nullable();
              $table->string('plan_name');
              $table->enum('billing_type', ['monthly', 'yearly']);
              $table->decimal('price', 10, 2);
              $table->enum('is_active', ['yes', 'no'])->default('yes');
              $table->date('validity_till')->nullable();
              $table->date('next_payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
