<?php

namespace App\Http\Controllers;
use App\Category;
use App\Brand;
use App\Product;
use Image;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {

    	$categories=Category::where('optradio',1)->get();
    	$brands=Brand::where('optradio',1)->get();

    	return view('admin.products.add_product',[
     'categories'=>$categories,
      'brands'  =>$brands,
    	]);
    }



    protected function productValidate($request)
     {
    	$this->validate($request,[
        'product_name'=>'required',
        'product_price'=>'required',
        'product_quantity'=>'required',
        'short_description'=>'required',
        'long_description'=>'required',
        'product_image'=>'required',
        'publishes_status'=>'required'
        


    	]);
    }


protected function productimageinfo($request)
    {
    	           $productimage=$request->file('product_image');
                   //$imagenames=$productimage->getClientOriginalName();
                   $filetype=$productimage->getClientOriginalExtension();
                   $imagename=$request->product_name.'.'.$filetype;
                   $directory='product-images/';
                   $imageurl=$directory.$imagename;
                   //$productimage->move($directory,$imagename);
                   Image::make($productimage)->save($imageurl);
                   return $imageurl; 
    }
protected function productbasicinfo($request,$imageurl)
{

	                
                   $products=new Product;
                   $products->category_id=$request->category_id;
                   $products->brand_id=$request->brand_id;
                   $products->product_name=$request->product_name;
                   $products->product_price=$request->product_price;
                   $products->product_quantity=$request->product_quantity;
                   $products->short_description=$request->short_description;
                   $products->long_description=$request->long_description;
                   $products->product_image=$imageurl;
                   $products->publishes_status=$request->publishes_status;
                    
                   $products->save();          

}




    public function saveproduct(Request $request)
                 {
                   $this->productValidate($request);

                   $imageurl=$this->productimageinfo($request);
                  

                  $this->productbasicinfo($request,$imageurl);

              

                   return redirect('/product/add')->with('message','Product Save is successfully');
                    }



public function manageproduct()
{
	$products=DB::table('products')
	                   ->join('categories','products.category_id','=','categories.id')
	                   ->join('brands','products.brand_id','=','brands.id')
	                   ->select('products.*','categories.category_name','brands.brand_name')
	                   ->get();

	                 
	return  view('admin.products.manage_product',['products'=>$products]);
}

public function productedit($id)

{

  $products=Product::find($id);
  $categories=Category::where('optradio',1)->get();
  $brands=Brand::where('optradio',1)->get();


  return view('admin.products.edit_product',[
    'products'=>$products,
    'categories'=>$categories,
    'brands'=>$brands
  ]);
}




public function productupdateinfo($products,$request,$imageurl=null)
{
                   $products->category_id=$request->category_id;
                   $products->brand_id=$request->brand_id;
                   $products->product_name=$request->product_name;
                   $products->product_price=$request->product_price;
                   $products->product_quantity=$request->product_quantity;
                   $products->short_description=$request->short_description;
                   $products->long_description=$request->long_description;
                   if ($imageurl) {
                     $products->product_image=$imageurl;
                   }
                   
                   $products->publishes_status=$request->publishes_status;

                   $products->save(); 
}



public function producteupdate(Request $request)
{
  $productimage=$request->file('product_image') ;
    $products=Product::find($request->product_id);
    if ($productimage) {
     unlink($products->product_image);
          $imageurl=$this->productimageinfo($request);
       $this->productupdateinfo($products,$request,$imageurl);
      }

    else {
              $this->productupdateinfo($products,$request);    
        }
         return redirect('/product/manage')->with('message','Product upadte is successfully');
}




}

