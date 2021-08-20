<?php

namespace App\Http\Controllers;

use App\Mail\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailgunController extends ApiController
{
    /**
     * Create a new MailgunController instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Create a new MailgunController instance.
     *
     * @return void
     */
    public function send(Request $request)
    {
        // No validation, testing purposes only
        Mail::to($request->email)->send(new Promo());
        return $this->successResponse(null, "Mail sent");
    }
}
