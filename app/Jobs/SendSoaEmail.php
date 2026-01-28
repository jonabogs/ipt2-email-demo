<?php

namespace App\Jobs;

use App\Mail\SoaMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSoaEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $soa;
    public $customer;

    public function __construct($soa, $customer)
    {
        $this->soa = $soa;
        $this->customer = $customer;
    }

    public function handle()
    {
        Mail::to($this->customer->email)
            ->send(new SoaMail($this->soa, $this->customer));
    }
}
