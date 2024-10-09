<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class ProductController extends Controller
{
    public function index(Request $r) {
        $categoryNumber = $this->defineCategoryNumber($r->path());
        $products = Product::where('status', '!=', 0);
        if ($categoryNumber) {
            $products = $products->where('category', $categoryNumber);
        }
        $searchTxt = $r->query('key-search');
        if ($searchTxt) {
            $products = $products->where('name', 'LIKE', '%'.$searchTxt.'%');
        }
        $products = $products->paginate(24)->withQueryString();
        return view('user_views.pages.products.listing', [
            'categoryNumber' => $categoryNumber,
            'pathInfo' => $r->path(),
            'products' => $products
        ]);
    }

    private function defineCategoryNumber($pathUrl) {
        switch ($pathUrl) {
            case 'san-pham/xi-mang':
                return 1;
            case 'san-pham/keo-vua-xay-dung':
                return 2;
            case 'san-pham/gach-da-op-lat':
                return 3;
            case 'san-pham/vat-lieu-chong-tham':
                return 4;
            case 'san-pham/ngoi-lop':
                return 5;
            default:
                return 0;
        }
    }

    public function showing($id) {
        $product = Product::where('status', '!=', 0)->where('id', $id)->first();
        if (!$product) {
            return redirect()->back()->with('error','Invalid Product');
        }
        return view('user_views.pages.products.showing', ['product' => $product]);
    }
}
