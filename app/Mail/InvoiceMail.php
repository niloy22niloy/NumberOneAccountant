<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
use Queueable, SerializesModels;

public $invoice;
public $subscription;

public function __construct($invoice, $subscription)
{
$this->invoice = $invoice;
$this->subscription = $subscription;
}

public function build()
{
return $this->subject("Your Invoice for {$this->subscription->plan_name}")
->view('emails.invoice');
}
}
