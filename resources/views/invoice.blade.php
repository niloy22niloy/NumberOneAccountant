<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .details {
            margin: 20px 0;
        }

        .details p {
            margin: 5px 0;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f8f8f8;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Invoice</h2>
        </div>

        <div class="details">
            <p><strong>Invoice ID:</strong> {{ $invoice->stripe_invoice_id }}</p>
            <p><strong>Package Name:</strong> {{ $subscription->plan_name }}</p>
            <p><strong>Billing Type:</strong> {{ $subscription->billing_type }}</p>
            <p><strong>Amount:</strong> ${{ $invoice->amount }}</p>
            <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>
            <p><strong>Next Payment Date:</strong> {{ $subscription->next_payment_date->format('Y-m-d') }}</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $subscription->plan_name }} ({{ $subscription->billing_type }})</td>
                    <td>${{ $invoice->amount }}</td>
                    <td>${{ $invoice->amount }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Thank you for subscribing to our service!</p>
        </div>
    </div>
</body>

</html>
