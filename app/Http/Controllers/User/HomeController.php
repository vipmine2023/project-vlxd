<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = (object) [
            'cement' => Product::where('status', '!=', 0)->where('category', 1)->limit(8)->get(),
            'mortars' => Product::where('status', '!=', 0)->where('category', 2)->limit(8)->get(),
            'bricks' => Product::where('status', '!=', 0)->where('category', 3)->limit(8)->get(),
            'waterproof_materials' => Product::where('status', '!=', 0)->where('category', 4)->limit(8)->get(),
            'roofing_tiles' => Product::where('status', '!=', 0)->where('category', 5)->limit(8)->get()
        ];
        
        return view('user_views.pages.index', ['products' => $products]);
    }

    public function order_index() {
        $orders = Order::where('created_by', Auth::user()->id)->paginate( 25);
        return view('user_views.pages.profiles.orders.index', ['orders' => $orders]);
    }

    public function order_showing($id) {
        $order = Order::where('code', $id)
                        ->where('created_by', Auth::user()->id)
                        ->first();
        if (!$order) {
            return back()->with('error','Đơn hàng không hợp lệ');
        }
        $order_details = OrderDetail::where('order_id', $order->id)->paginate(perPage: 25);
        return view('user_views.pages.profiles.orders.showing', ['order' => $order, 'order_details' => $order_details]);
    }

    public function cancel_order($id) {
        $order = Order::where('code', $id)
                      ->where('created_by', Auth::user()->id)
                      ->where('status', 0)
                      ->first();
        if (!$order) {
            return back()->with('error','Đơn hàng không hợp lệ');
        }
        $order->status = 2;
        try {
            $order->save();
        } catch (\Exception $e) {
            return redirect()->back()->with("error","Hủy đơn hàng không thành công");
        }
        return redirect()->back()->with("success","Hủy đơn hàng thành công");
    }

}
