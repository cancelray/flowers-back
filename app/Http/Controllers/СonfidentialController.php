<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class СonfidentialController extends Controller
{
    public function index()
    {
        return view('confidential.index');
    }
}
