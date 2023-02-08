<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class frontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('frontend.index', compact('categories'));
    }

    public function ProductDetails(){
        return view('frontend.product_page');
    }
}
