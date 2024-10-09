<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cart;
use DB;
use Session;

class OrderController extends Controller
{
    public function showing() {
        $cart_total = Cart::total();
        if ($cart_total == 0) {
            return redirect('/gio-hang')->with("empty_cart","Giỏ hàng rỗng");
        }
        
        return view('user_views.pages.orders.showing', [ 'cart_items' => Cart::content(), 'invalid_items' => $this->update_cart(), 'total' => Cart::subtotal(0, 0, '') ]);
    }

    public function confirm(StoreOrderRequest $request) {
        $cart_total = Cart::total();
        if ($cart_total == 0) {
            return redirect('/gio-hang')->with("empty_cart","Giỏ hàng rỗng");
        }
        $invalid_items = $this->update_cart();
        if (count($invalid_items) > 0) {
            return redirect()->back()->with("error","Vật phẩm trong giỏ hàng không hợp lệ.");
        }

        $order = new Order;
        $order->code = Str::random(16);
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->receiver_name = $request->receiver_name;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->payment_method = $request->payment_method;
        DB::beginTransaction();
        try {
            $order->save();
            OrderDetail::insert($this->oder_detail_params($order->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with("error","Insert Fail");
        }
        Cart::destroy();
        Session::flash('success', 'Tạo đơn hàng thành công.');
        return redirect('/gio-hang');
    }

    private function oder_detail_params($order_id) {
        $oder_detail_params = [];
        foreach(Cart::content() as $cart_item) {
            array_push($oder_detail_params, [
                'order_id' => $order_id,
                'quantity' => $cart_item->qty,
                'price' => $cart_item->price,
                'product_name' => $cart_item->name
            ]);
        }

        return $oder_detail_params;
    }
}
