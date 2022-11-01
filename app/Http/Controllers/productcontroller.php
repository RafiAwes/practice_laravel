<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SCategory;
use App\product;

class productcontroller extends Controller
{
    public function addProdPage(){
        $categories = Category::all();
        $subcategories = SCategory::all();
        return view('backend.product.addProduct', compact('categories','subcategories'));
    }
}
