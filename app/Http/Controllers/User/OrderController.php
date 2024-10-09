<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;
use Cart;

class OrderController extends Controller
{
    public function showing() {
        $cart_total = Cart::total();
        if ($cart_total == 0) {
            return redirect('/gio-hang')->with("empty_cart","empty cart");
        }
        return view('user_views.pages.orders.showing');
    }

    public function confirm(StoreOrderRequest $request) {
        $cart_total = Cart::total();
        if ($cart_total == 0) {
            return redirect('/gio-hang')->with("empty_cart","empty cart");
        } 
    }
}
