<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentAndDeliveryController extends Controller
{
    public function index()
    {
        return view('payment-and-delivery.index');
    }
}
