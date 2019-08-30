<?php

namespace App\Http\Controllers;
use App\Category;



use Illuminate\Http\Request;
//use DB;


class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.home.home');
    }
    public function addcategory()
    {
    	return view('admin.category.add_category');
    } 

  public function savecategory(Request $request)
    { 
    	
    	$category=new Category();
    	$category->category_name=$request->category_name;
    	$category->comment=$request->comment;
    	$category->optradio=$request->optradio;
    	$category->save();
    	return redirect('/category/addcategory')->with('message','Save Successfull') ;
    	

    	//Category::create($request->all());
    
    //	DB::table('categories')->insert([
    //'category_name'=>$request->category_name,
    //'comment'      =>$request->comment,
    //'optradio'     =>$request->optradio

    	//]);

    	
    	

    	return redirect('/category/addcategory')->with('message','Save Successfull') ;
    }



 public function managecategory()
    
    {   
    $categories=Category::all();
    	 //return  $categories;
    return view('admin.category.manage_category',['categories'=>$categories]);
    }

    public function unpublished_category($id)
    {
    	$category=Category::find($id);
    	//return $category;
    	$category->optradio=0;
    	$category->save();
    	return redirect('/category/managecategory')->with('message','category unpublished');
    }
 public function published_category($id)
    {
    	$category=Category::find($id);
    	//return $category;
    	$category->optradio=1;
    	$category->save();
    	return redirect('/category/managecategory')->with('message','category published');
    }

    public function edit_category($id)
    {
    	$category=Category::find($id);
    	return view('admin.category.edit_category',['category'=>$category]);
    }


    public function update_category(Request $request)
    {
      $category=Category::find($request->category_id);
      $category->category_name=$request->category_name;
      $category->comment=$request->comment;
      $category->optradio=$request->optradio;
      $category->save();

      return redirect('category/managecategory')->with('message','Update successfully!!!');
    }


     public function delete_category($id)
    {
    	$category=Category::find($id);
    	$category->delete();

    	return redirect('category/managecategory')->with('message','delete successfully!!!');
    }



    
}
