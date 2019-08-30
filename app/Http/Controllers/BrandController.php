<?php

namespace App\Http\Controllers;
use App\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
   public function addbrand()
   {
    return view('admin.brand.add_brand');
   }

   public function savedbrand(Request $request)
   {
    $this->validate($request,[
        
      'brand_name'=>'required|regex:/^[\pL\s\-]+$/u|max:15|min:5',
      'brand_description'=>'required',
      'optradio'=>'required'
    ]);

    $brand=new Brand();
    $brand->brand_name=$request->brand_name;
    $brand->brand_description=$request->brand_description;
    $brand->optradio=$request->optradio;
    //return $brand;
    $brand->save();

    return redirect('/brand/add')->with('message','Brand save successfully');

     }


     public function managebrand()
     {
        $brands=Brand::all();
        //return $brands;
        return view('admin.brand.manage_brand',['brands'=>$brands]);
     }














}
