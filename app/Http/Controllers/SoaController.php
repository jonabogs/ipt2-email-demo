<?php

namespace App\Http\Controllers;

use App\Jobs\SendSoaEmail;
use App\Models\Customer; // Missing import
use App\Models\Soa;      // Missing import
use Illuminate\Http\Request;

class SoaController extends Controller
{
    public function sendMultipleSoa(Request $request)
    {
        $customers = $request->input('customers'); // Array of customer IDs
        $delay = 0;

        foreach ($customers as $customerId) {
            $customer = Customer::find($customerId);

            // Add null check
            if (!$customer) {
                continue;
            }

            $soa = $this->generateSoa($customer);

            // Dispatch with delay
            SendSoaEmail::dispatch($soa, $customer)
                ->delay(now()->addSeconds($delay));

            $delay += 5; // Add 5 seconds delay for next email
        }

        return response()->json([
            'message' => 'SOA emails queued successfully',
            'count' => count($customers)
        ]);
    }

    public function show($id)
    {
        $soa = Soa::with('customer')->findOrFail($id);
        return view('soa.show', compact('soa'));
    }

    private function generateSoa($customer)
    {
        // Example SOA generation logic
        // Adjust this based on your actual database structure

        $soa = new Soa();
        $soa->customer_id = $customer->id;
        $soa->total_balance = 0;

        // Example: Get transactions or items for this customer
        // $items = Transaction::where('customer_id', $customer->id)->get();
        // $soa->items = $items;
        // $soa->total_balance = $items->sum('amount');

        return $soa;
    }
}
