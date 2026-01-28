<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SoaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $soa;
    public $customer;

    public function __construct($soa, $customer)
    {
        $this->soa = $soa;
        $this->customer = $customer;
    }

    public function build()
    {
        return $this->subject('Statement of Account')
            ->view('emails.soa');
    }
}
