<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{

	public function cartdaad(Request $request)
	{
              $products=Product::find($request->id);
              Cart::add([
                     'id'=>$request->id,
                     'name'=>$products->product_name,
                     'price'=>$products->product_price,
                     'qty'=>$request->qty,
                     'options'=>[
                      'image'=>$products->product_image
                     ]
                    
              ]);

              return redirect('/cart/show');
	}

	public function showcart()
	{
		$cartItems=Cart::content();
		
		return view('frontend.cart.show_cart',['cartItems'=>$cartItems]);
	}

	public function deletecart($id)
	{
		Cart::remove($id);
		return redirect('/cart/show');
	}

	public function cartqtyupadte(Request $request)
	{

		Cart::update($request->rowId,$request->qty);
        return redirect('/cart/show');
	}

}
