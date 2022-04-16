<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentErrorController extends Controller
{
    public function index()
    {
        return view('payment-error.index');
    }
}
