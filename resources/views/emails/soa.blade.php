<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
        }

        .content {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Statement of Account</h2>
    </div>
    <div class="content">
        <p>Dear {{ $customer->name }},</p>
        <p>Please find your statement of account below:</p>

        <table>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Balance</th>
            </tr>
            @foreach($soa->items as $item)
            <tr>
                <td>{{ $item->date }}</td>
                <td>{{ $item->description }}</td>
                <td>${{ number_format($item->amount, 2) }}</td>
                <td>${{ number_format($item->balance, 2) }}</td>
            </tr>
            @endforeach
        </table>

        <p><strong>Total Balance: ${{ number_format($soa->total_balance, 2) }}</strong></p>
    </div>
</body>

</html>