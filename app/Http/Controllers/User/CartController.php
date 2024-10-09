<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function showing() {
        if (Cart::count() == 0) {
            return view('user_views.pages.carts.showing', [ 'cart_items' => [], 'total' => 0 ]);
        }
        $product_ids = Cart::content()->map(function($item) {
            return $item->id;
        })->values();
        $products = Product::whereIn("id", $product_ids)->get();
        if (count($products) == 0) {
            return view('user_views.pages.carts.showing', [ 'cart_items' => [], 'total' => 0 ]);
        }
        foreach(Cart::content() as $item) {
            foreach($products as $product) {
                if ($product->id != $item->id) {
                    continue;
                }
                $item->name = $product->name;
                $item->price = $product->price;
                $item->options->status = $product->status;
                $item->options->category = $product->category;
                $item->options->image_url = $product->image_url;
            }
        }
        return view('user_views.pages.carts.showing', [ 'cart_items' => Cart::content(), 'total' => Cart::subtotal(0, 0, '') ]);
    }

    public function creator(Request $request) {
        $product = Product::where('status', '!=', 0)->where('id', $request->product_id)->first();
        if (!$product) {
            return redirect()->back()->with('error','Invalid Product');
        }
        $is_updated = false;
        $messages = [
            'key' => 'success',
            'value' => 'Thêm vào giỏ hàng thành công.'
        ];
        foreach(Cart::content() as $item) {
            if ($item->id != $product->id) {
                continue;
            }
            $new_qty = $item->qty + 1;
            if ($new_qty <= 10) {
                Cart::update($item->rowId, $new_qty);
            } else {
                $messages = [
                    'key' => 'error',
                    'value' => 'Số lượng sản phẩm vượt quá 10.'
                ];
            }
            $is_updated = true;
        }
        if (!$is_updated) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'weight' => 0,
                'qty' => 1,
                'options' => [
                    'status' => $product->status,
                    'category' => $product->category,
                    'image_url' => $product->image_url
                ]
            ]);
        }
        
        return redirect()->back()->with($messages['key'],$messages['value']);
    }

    public function removing(Request $request) {
        if (!$request->cart_id) {
            return redirect()->back()->with('error','Invalid'); 
        }
        $cart = Cart::get($request->cart_id);
        if (!$cart) {
            return redirect()->back()->with('error','Invalid Cart');
        }
        Cart::remove($cart->rowId);
        return redirect()->back();
    }

    public function updater(Request $request) {
        if (!$request->cart_id || $request->quantity < 1 || $request->quantity > 10) {
            return redirect()->back()->with('error','Invalid'); 
        }
        $cart = Cart::get($request->cart_id);
        if (!$cart) {
            return redirect()->back()->with('error','Invalid Cart');
        }
        Cart::update($cart->rowId, $request->quantity);
        return redirect()->back();
    }
}
