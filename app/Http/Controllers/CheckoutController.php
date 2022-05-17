<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index()
    {
        $prices = $this->getPrices();

        $totalPrice = $prices['totalPrice'];
        $deliveryPrice = $prices['deliveryPrice'];

        return view('checkout.index');
    }

    public function getPrices() 
    {
        $cart = session()->get('cart');
        $dbProducts = Product::whereIn('id', array_keys($cart))->get();
        $freeDeliveryThreshold = 2500;
        $delivery = 300;
        $prices = [];
        $totalPrice = 0;

        $products = [];
        foreach ($dbProducts as $dbProduct) {
            $products[$dbProduct->id] = $dbProduct;
        }

        foreach ($cart as $productId => $count) {
            $totalPrice += $products[$productId]['price'] * $count;
        }

        $prices['totalPrice'] = $totalPrice;

        if ($totalPrice < $freeDeliveryThreshold) {
            $prices['deliveryPrice'] = $delivery;
            $prices['totalPrice'] += $delivery;
        } else {
            $prices['deliveryPrice'] = 0;
        }

        return $prices;
    }
}
