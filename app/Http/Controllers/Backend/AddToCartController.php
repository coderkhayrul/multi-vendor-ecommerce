<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class AddToCartController extends Controller
{
    public function addtocart($slug){
        $product = Product::where('product_slug', $slug)->first();

        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_discount_price,
            'quantity' => 1,
            'attributes' => ['image' => $product->product_thumbnails, 'pcode' => $product->product_code],
        ]);

        return redirect()->back();
    }

    public function cartremove($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function shoppingcart(){
        return view('frontend.shopping_cart');
    }
}
