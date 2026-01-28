@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Statement of Account</h2>
    <div class="card">
        <div class="card-header">
            Customer: {{ $soa->customer->name }}
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($soa->items as $item)
                    <tr>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->description }}</td>
                        <td>${{ number_format($item->amount, 2) }}</td>
                        <td>${{ number_format($item->balance, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Total: ${{ number_format($soa->total_balance, 2) }}</h4>
        </div>
    </div>
</div>
@endsection