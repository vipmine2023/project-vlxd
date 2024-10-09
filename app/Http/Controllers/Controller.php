<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Cart;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function update_cart() {
        $product_ids = Cart::content()->map(function($item) {
            return $item->id;
        })->values();
        $products = Product::whereIn("id", $product_ids)->get();
        if (count($products) == 0) {
            return [ '1' => 'error' ];
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
        $invalid_items = Cart::content()->filter(function($item) {
            if ($item->options->status != 1) {
                return $item;
            } 
        });

        return $invalid_items;
    }
}
