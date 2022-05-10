<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomOrderSend; 

class MailController extends Controller
{
    public function customOrder(Request $request)
    {
        $bodyContent = $request->getContent();
        Mail::to('ourfavoriteflowers@gmail.com')->send(new CustomOrderSend($bodyContent));

        return response()->json("success");
    }
}
