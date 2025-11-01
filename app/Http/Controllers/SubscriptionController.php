<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Subscription;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    //
    public function show($id)
    {
        $subscription = Subscription::where('id', $id)
            ->where('user_id', Auth::id()) // ensure user only accesses their subscription
            ->firstOrFail();

        $isExpired = $subscription->is_active === 'no' || $subscription->validity_till < now()->format('Y-m-d');

        // Get linked files
        $files = $subscription->files()->get();

        return view('subscriptions.show', compact('subscription', 'files', 'isExpired'));
    }
     public function sendToAdmin(Request $request, $subscriptionId)
     {
     $subscription = Subscription::where('id', $subscriptionId)
     ->where('user_id', Auth::id())
     ->firstOrFail();

     if ($subscription->is_active === 'no' || $subscription->validity_till < now()->format('Y-m-d')) {
         return back()->with('error', 'Subscription expired. You cannot send files.');
         }

         $request->validate([
         'file' => 'required|file',
         ]);

         $file = $request->file('file');

         // ✅ Store file in the 'public' disk
         $path = $file->store('user-files', 'public');

         Files::create([
         'file_name' => $file->getClientOriginalName(),
         'file_path' => $path,
         'subscription_id' => $subscription->id,
         'user_id' => Auth::id(),
         'is_transferable' => 'yes',
         'transfer_type' => 'send',
         ]);

         return back()->with('success', 'File sent to admin successfully!');
         }

         /**
         * Handle secure file download.
         */
         public function download($id)
         {
         $file = Files::findOrFail($id);
         $subscription = $file->subscription;

         // ✅ Check access rights
         if ($file->transfer_type === 'send' && $file->user_id !== Auth::id()) {
         abort(403, 'Unauthorized access.');
         }

         // ✅ Check subscription validity
         if ($subscription->is_active === 'no' || $subscription->validity_till < now()->format('Y-m-d')) {
             abort(403, 'Subscription expired. File download not allowed.');
             }

             // ✅ Check file existence in storage
             if (!Storage::disk('public')->exists($file->file_path)) {
             abort(404, 'File not found.');
             }

             // ✅ Download file
             return Storage::disk('public')->download($file->file_path, $file->file_name);
             }
}
