<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice - Number One Accountant</title>
</head>

<body style="margin:0; padding:0; font-family: 'Inter', Arial, sans-serif; background-color:#f8f9fa; color:#333;">
    <div style="max-width:900px; margin:40px auto; padding:30px; background:#fff; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        <!-- Header -->
        <div style="display:flex;align-items:center; justify-content:space-between;gap:50px; margin-bottom:40px;">
            <div style="margin-bottom:20px;">
                <h1 style="margin:0; font-weight:bold; font-size:28px; color:#0d6efd;">NumberOneAccountant</h1>
                <h4 style="margin:5px 0 0 0; font-weight:bold; color:#212529;">Number One Accountant</h4>
                <p style="margin:2px 0 0 0; font-size:12px; color:#6c757d;">123 Corporate Lane, Finance City</p>
                <p style="margin:2px 0 0 0; font-size:12px; color:#6c757d;">Email: info@numberone.com</p>
                <p style="margin:2px 0 0 0; font-size:12px; color:#6c757d;">Phone: (555) 123-4567</p>
            </div>
            <div style="text-align:right;">
                <h1 style="margin:0 0 10px 0; color:#0d6efd; font-weight:bold;">INVOICE</h1>
                <p style="margin:0 0 3px 0;"><strong>Invoice #:</strong> {{ $invoice->id ?? 'INV-0001' }}</p>
                <p style="margin:0 0 3px 0;"><strong>Date Issued:</strong>
                    {{ \Carbon\Carbon::parse($invoice->created_at ?? now())->format('M d, Y') }}</p>
                <p style="margin:0;"><strong>Due Date:</strong>
                    {{ \Carbon\Carbon::parse($subscription->validity_till ?? now())->format('M d, Y') }}</p>
            </div>
        </div>

        <hr style="border:none; border-bottom:2px solid #0d6efd; margin-bottom:30px;">

        <!-- Billed To & Package Details -->
        <div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:30px;">
            <div style="flex:1; min-width:280px;">
                <div style="border:1px solid #ddd; border-radius:4px;">
                    <div style="background-color:rgba(13,110,253,0.1); color:#0d6efd; font-weight:bold; padding:8px;">
                        BILLED TO
                    </div>
                    <div style="padding:10px;">
                        <h6 style="margin:0 0 5px 0; font-weight:bold;">{{ $subscription->user->name ?? 'User' }}</h6>
                        <p style="margin:0 0 5px 0; font-size:12px;">
                            {{ $subscription->user->email ?? 'user@example.com' }}</p>
                        <p style="margin:0 0 5px 0; font-size:12px;">
                            {{ $subscription->user->address ?? 'No Address Provided' }}</p>
                        <p style="margin:0; font-size:12px;">{{ $subscription->user->phone ?? '(000) 000-0000' }}</p>
                    </div>
                </div>
            </div>

            <div style="flex:1; min-width:280px;">
                <div style="border:1px solid #ddd; border-radius:4px;">
                    <div style="background-color:rgba(13,110,253,0.1); color:#0d6efd; font-weight:bold; padding:8px;">
                        PACKAGE DETAILS
                    </div>
                    <div style="padding:10px;">
                        <h6 style="margin:0 0 5px 0; font-weight:bold;">{{ $subscription->plan_name }}</h6>
                        <p style="margin:0 0 5px 0; font-size:12px;">Billing Type: {{ $subscription->billing_type }}</p>
                        <p style="margin:0 0 5px 0; font-size:12px;">Validity Till:
                            {{ \Carbon\Carbon::parse($subscription->validity_till ?? now())->format('M d, Y') }}</p>
                        <p style="margin:0; font-size:12px;">Reference: {{ $invoice->reference ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Table -->
        <h5 style="margin-bottom:15px; font-weight:bold; color:#212529;">Services Rendered</h5>
        <table style="width:100%; border-collapse:collapse; margin-bottom:30px;">
            <thead>
                <tr style="background-color:rgba(13,110,253,0.1); color:#0d6efd; font-weight:bold;">
                    <th style="padding:8px; border:1px solid #ddd;">#</th>
                    <th style="padding:8px; border:1px solid #ddd;">Description</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:right;">Rate</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:right;">Qty</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:right;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding:8px; border:1px solid #ddd;">1</td>
                    <td style="padding:8px; border:1px solid #ddd;">{{ $subscription->plan_name }} Subscription</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:right;">
                        ${{ number_format($invoice->amount, 2) }}</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:right;">1</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:right; font-weight:bold;">
                        ${{ number_format($invoice->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Payment Details & Total -->
        <div style="display:flex; flex-wrap:wrap; gap:20px;">
            <div style="flex:1; min-width:280px;">


                <h5 style="margin-bottom:5px; font-weight:bold; color:#212529;">Notes:</h5>
                <p style="margin:0; font-size:12px; color:#6c757d;">Thank you for choosing Number One Accountant. We
                    appreciate your business.</p>
            </div>

            <div style="flex:1; min-width:280px;">
                <table style="width:100%; border-collapse:collapse; text-align:right;">
                    <tbody>
                        <tr>
                            <td style="padding:5px;">Subtotal:</td>
                            <td style="padding:5px; font-weight:bold;">${{ number_format($invoice->amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td style="padding:5px;">Tax (0%):</td>
                            <td style="padding:5px; font-weight:bold;">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding:10px 0;">
                                <div style="background-color:#0d6efd; color:#fff; padding:15px; border-radius:4px;">
                                    <h4 style="margin:0;">AMOUNT DUE</h4>
                                    <h2 style="margin:0; font-weight:bold;">${{ number_format($invoice->amount, 2) }}
                                    </h2>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
