<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use carbon\carbon;
use App\product;
use Session;
use App\cart;


class cartController extends Controller
{
    public function addToCart(Request $request){
        if(session::has('random_number')){
            if(cart::where('random_number',session('random_number'))->where('product_id',$request->product_id)->exists()){
                cart::where('random_number', session('random_number'))->where('product_id',$request->product_id)->increment('qty', $request->qty);
                Toastr::success('Added to cart', 'Added', ["positionClass" => "toast-top-right"]);
                return back();

            }
            else{
                $data = product::where('id', $request->product_id)->first();
                cart::insert([
                    'random_number' => session('random_number'),
                    'product_id' => $request->product_id,
                    'qty' => $request->qty,
                    'price' => $data->price,
                    'created_at' => carbon::now(),
                ]);
                Toastr::success('Added to cart', 'Added', ["positionClass" => "toast-top-right"]);
                return back();
            }

        }
        else{
            $random_number = str::random(10);
            session(['random_number' => $random_number]);

            $data = product::where('id', $request->product_id)->first();
            cart::insert([
                'random_number' => session('random_number'),
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'price' => $data->price,
                'created_at' => carbon::now(),
            ]);
            Toastr::success('Added to cart', 'Added', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function deleteItem($id){
        cart::where('id',$id)->delete();
        Toastr::success('Item deleted', 'Removed', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
