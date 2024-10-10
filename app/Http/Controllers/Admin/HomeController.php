<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Database\Query\Builder;

class HomeController extends Controller
{
  public function index(Request $r) {
    $products = DB::table('products');
    if ($r->get('category-number')) {
        $products = $products->where('category', $r->get('category-number'));
    }
    if ($r->get('search-key')) {
        $products = $products->where(function (Builder $query) use($r) {
                        $query->where('name', 'LIKE', '%'.$r->get('search-key').'%');
                    });
    }
    $products = $products->offset(0)->paginate(20)->withQueryString();
    return view('admin.index', compact('products'));
  }

  public static function new() {
    return view('admin.new');
  }

  public function create(StoreProductRequest $request) {
    $request['price'] = str_replace('.', '', $request['price']);
    $input = $request->all();
    $imageName = rand(1000, 9999) . '-' . $request->file('image_name')->getClientOriginalName();
    //upload image public
    Storage::disk('public')->put($imageName, file_get_contents($request->file('image_name')));
    $url = 'storage/images/' . $imageName; //get url upload

    $is_success = false;
    DB::beginTransaction();
    try {
      $is_success = DB::table('products')->insert([
        'name' => $input['name'],
        'description' => $input['description'],
        'image_url' => $url,
        'status' => 1,
        'price' => $input['price'],
        'category' => $input['category']
      ]);
      DB::commit();
    } catch (\Exception $e) {
      Storage::disk('public')->delete(basename($url)); //delete new image in public
      DB::rollback();
      return back();
    }

    if ($is_success) {
      return redirect()->route('admin.index')->with('success', 'Thêm mới thành công');
    }
  }

  public function edit(Request $request) {
    $product = DB::table('products')->where('id', $request->id)->first();
    if (!$product) {
        return redirect()->route('admin.index');
    }
    return view('admin.edit', ['product' => $product]);
  }

  public function update(StoreProductRequest $request) {
    $input = $request->all();
    $product = DB::table('products')->where('id', $input['id'])->first();
    if (!$product) {
      return redirect()->route('admin.index');
    }
    $input['price'] = str_replace('.', '', $input['price']);
    $product_params = [
      'name' => $input['name'],
      'description' => $input['description'],
      'price' => $input['price'],
      'category' => $input['category'],
      'status' => $input['status']
    ];
    $old_image_url_product = $product->image_url;
    if ($request->file('image_name')) {
      $imageName = rand(1000, 9999) . '-' . $request->file('image_name')->getClientOriginalName();
      //upload image public
      Storage::disk('public')->put($imageName, file_get_contents($request->file('image_name')));
      $url = 'storage/images/' . $imageName; //get url upload
      $product_params = array_merge($product_params, ['image_url' => $url]);
    }

    DB::beginTransaction();
    try {
      DB::table('products')->where('id', $product->id)->update($product_params);
      DB::commit();
    } catch (\Exception $e) {
      if ($request->file('image_name')) {
        Storage::disk('public')->delete(basename($product_params['image_url']));
      }
      DB::rollback();
      return back();
    }

    if ($request->file('image_name')) {
      Storage::disk('public')->delete(basename($old_image_url_product)); //delete old image in public
    }
    return redirect()->route('admin.index')->with('success', 'Cập nhật thành công');
  }

  public function delete(Request $request) {
    $id = $request['id'];
    $product = DB::table('products')->where('id', $id)->first();
    if (!$product) {
      return redirect()->route('admin.blogs.index');
    }
    $image_url = $product->image_url;
    $is_success = false;
    DB::beginTransaction();
    try {
      $is_success = DB::table('products')->where('id', $id)->delete();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
    }

    if (!$is_success) {
      return back();
    }
    Storage::disk('public')->delete(basename($image_url)); //delete old image in public

    return redirect()->route('admin.index')->with('success', 'Xóa thành công');
  }
}