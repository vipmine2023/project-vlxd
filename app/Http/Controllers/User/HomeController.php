<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
}
