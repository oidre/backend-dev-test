<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Promo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The customer instance.
     *
     * @var Customer
     */
    protected $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->customer = [
            'name' => 'Customer Name'
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.promo')
            ->with([
                'customerName' => $this->customer['name']
            ]);
    }
}
