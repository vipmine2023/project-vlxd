<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Database\Query\Builder;

class OrderController extends Controller
{
  public function index(Request $request) {
    $orders = DB::table('orders');

    $status_number = $request->get('status') == null ? 9 :(int)$request->get('status');
    if ($status_number != 9) {
      $orders = $orders->where('status', $status_number);
    }

    $orders = $orders->orderByDesc('orders.created_at')->offset(0)->paginate(20)->withQueryString();
    return view('admin.orders.index', compact('orders'));
  }

  public function update(Request $request) {
    $id = (int)$request->id;
    $status = (int)$request->status;
    $order = DB::table('orders')->where('id', $id)->first();
    if (!$order) {
      return redirect()->route('admin.orders.index');
    }
    $order_params = [
      'status' => $status
    ];
    DB::beginTransaction();
    try {
      DB::table('orders')->where('id', $order->id)->update($order_params);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return back();
    }
    return redirect()->route('admin.orders.index')->with('success', 'Xác nhận thành công');
  }

  public function detail($id) {
    $order_details = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->where('order_id', $id)
        ->select('order_details.*', 'orders.code', 'orders.status')
        ->get();
    if (!$order_details) {
        return redirect()->route('admin.orders.index');
    }

    return view('admin.orders.detail', compact('order_details'));
  }
}