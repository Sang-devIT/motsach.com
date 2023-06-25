<?php

namespace App\Http\Controllers\source;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('layouts.order.cart');    
    }
    public function checkout()
    {
        return view('layouts.order.checkout');    
    }
}
