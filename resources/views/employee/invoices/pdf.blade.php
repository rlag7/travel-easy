<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .invoice-table th, .invoice-table td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }
        .invoice-table th { background-color: #f4f4f4; }
    </style>
</head>
<body>
<h2>Invoice #{{ $invoice->invoice_number }}</h2>
<p><strong>Seat Number:</strong> {{ $invoice->booking->seat_number }}</p>
<p><strong>Invoice Date:</strong> {{ $invoice->invoice_date->format('d/m/Y') }}</p>

<table class="invoice-table">
    <thead>
    <tr>
        <th>Amount (€)</th>
        <th>VAT (€)</th>
        <th>Total (€)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ number_format($invoice->amount_ex_vat, 2) }}</td>
        <td>{{ number_format($invoice->vat, 2) }}</td>
        <td>{{ number_format($invoice->amount_inc_vat, 2) }}</td>
    </tr>
    </tbody>
</table>

<p><strong>Status:</strong> {{ ucfirst($invoice->invoice_status) }}</p>

<p><strong>Remarks:</strong> {{ $invoice->remarks ?? 'N/A' }}</p>
</body>
</html>
