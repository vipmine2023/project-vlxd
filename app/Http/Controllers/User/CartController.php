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
        return view('user_views.pages.carts.showing', [ 'cart_items' => Cart::content(), 'invalid_items' => $this->update_cart(), 'total' => Cart::subtotal(0, 0, '') ]);
    }

    public function creator(Request $request) {
        $product = Product::where('status', '=', 1)->where('id', $request->product_id)->first();
        if (!$product) {
            return redirect()->back()->with('error','Vật phẩm không hợp lệ.');
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
            return redirect()->back()->with('error','Vật phẩm trong giỏ hàng không hợp lệ.'); 
        }
        $cart = Cart::get($request->cart_id);
        if (!$cart) {
            return redirect()->back()->with('error','Vật phẩm trong giỏ hàng không hợp lệ.');
        }
        Cart::remove($cart->rowId);
        return redirect()->back();
    }

    public function updater(Request $request) {
        if (!$request->cart_id || $request->quantity < 1 || $request->quantity > 10) {
            return redirect()->back()->with('error','Vật phẩm trong giỏ hàng không hợp lệ.'); 
        }
        $cart = Cart::get($request->cart_id);
        if (!$cart) {
            return redirect()->back()->with('error','Vật phẩm trong giỏ hàng không hợp lệ.');
        }
        $product = Product::where('status', '!=', 0)->where('id', $cart->id)->first();
        $cart->name = $product->name;
        $cart->price = $product->price;
        $cart->options->status = $product->status;
        $cart->options->category = $product->category;
        $cart->options->image_url = $product->image_url;
        Cart::update($cart->rowId, $request->quantity);
        return redirect()->back();
    }
}
