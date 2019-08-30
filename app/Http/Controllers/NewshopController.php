<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;

use Illuminate\Http\Request;

class NewshopController extends Controller
{

  public function demo()
  {
    return "love";
  }
    public function index()

    {
      $newproducts=Product::where('publishes_status',1)
                               ->orderBy('id','DESC')
                               ->take(8)
                               ->get();
    return view('frontend.home.home',[ 'newproducts'=>$newproducts]);
   }

   public function homepage()
   { 
    $newproducts=Product::where('publishes_status',1)
    ->orderBy('id','DESC')
    ->take(8)
    ->get();
     return view('frontend.home.home-page',[ 'newproducts'=>$newproducts]);
   }



   public function productCategory($id)
   {
    $categoryproducts=Product::where('category_id',$id)
                                 ->where('publishes_status',1)
                                 ->get();
   	return view('frontend.category.category-content',['categoryproducts'=>$categoryproducts]);
   }




public function productdetails($id)
{
  $product=Product::find($id); 
  return view('frontend.product.product_details',['product'=>$product]);
}


   public function shortcode()
   {
   	return view('frontend.shortcode.shortcode');
   }

   public function mail()
   {
   	return view('frontend.mailing.mail');
   }
}
