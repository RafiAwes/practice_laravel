<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\SCategory;
use App\product;
use App\cart;

class frontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = product::orderBy('id','desc')->get();
        $carts = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->select('carts.*', 'products.name as product_name','products.image as product_image')
        ->where('random_number', session('random_number'))
        ->orderBy('id','desc')
        ->get();

        $count_cart_products = cart::where('random_number', session('random_number'))->count();
        return view('frontend.index', compact('categories','products','carts', 'count_cart_products'));
    }

    public function ProductDetails(){
        return view('frontend.product_page');
    }
}
