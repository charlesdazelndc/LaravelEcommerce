<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {

    	$name="robinhud pande";
    	$age=70;
    	return view('home',compact('name','age'));
    }
}
