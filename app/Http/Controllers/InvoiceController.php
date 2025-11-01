<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $invoice = Invoice::where('id', $id)
                    ->where('user_id', Auth::id()) 
                    ->firstOrFail(); 

        return view('invoices.show', compact('invoice'));
    }
}
