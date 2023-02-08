<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\SCategory;
use carbon\carbon;
use App\Category;
use App\product;
use Image;



class productcontroller extends Controller
{
    public function addProdPage(){
        $categories = Category::all();
        $subcategories = SCategory::all();
        return view('backend.product.addProduct', compact('categories','subcategories'));
    }

    public function addNewProduct(Request $request){

        $photos = array();
        $photos = $request->file('photos');
        foreach($photos as $photo ){
            $destinationPath = public_path().'/product_image/';
            $extraImageName = time().'.'.$photo->getClientOriginalExtension();
            $photo->move($destinationPath,$extraImageName);
        }


        if($request->hasFile('image')){
            //image processing
            $get_image = $request->file('image');
            $image_name = time().'.'. $get_image->getClientOriginalExtension();
            Image::make($get_image)->save('product_image/'.$image_name,100);

            //slug
            $without_space = str_replace(' ','-',$request->name);
            $without_slashAndSpace = str_replace('/','-',$without_space);
            $slug = str_replace('.','-',$without_slashAndSpace);

            //inserting product data

            product::insert([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'image' => 'product_image/'.$image_name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'slug' => $slug,
                'created_at' => carbon::now(),
            ]);
            Toastr::success('Successfully added', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }

    }
    public function viewProduct(){

        $products = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.category_name')
        ->orderBy('id','desc')
        ->paginate(15);
        return view('backend.product.productlist', compact('products'));
    }

    public function deleteProduct($id){

        $img = product::findOrFail($id);
        unlink($img->image);
        product::where('id',$id)
        ->delete();
        return back();

    }

    public function editProduct($id){

        $categories = Category::all();
        $subcategories = SCategory::all();
        $product = product::where('id', $id)->first();

        return view('backend.product.editProductpage', compact('product','categories','subcategories'));
    }

    public function updateProduct(Request $request){
        if($request->hasFile('image')){

            //removing current image
            $product_info = product::where('id', $request->product_id)->first();
            if($product_info->image != null){
                unlink($product_info->image);
            }
            //image processing
            $get_image = $request->file('image');
            $image_name = time().'.'. $get_image->getClientOriginalExtension();
            Image::make($get_image)->save('product_image/'.$image_name,100);

            //slug
            $without_space = str_replace(' ','-',$request->name);
            $without_slashAndSpace = str_replace('/','-',$without_space);
            $slug = str_replace('.','-',$without_slashAndSpace);

            //update product
            product::where('id', $request->product_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'image' => 'product_image/'.$image_name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'slug' => $slug,
                'updated_at' => carbon::now(),
            ]);
        }
        else{
            //slug
            $without_space = str_replace(' ','-',$request->name);
            $without_slashAndSpace = str_replace('/','-',$without_space);
            $slug = str_replace('.','-',$without_slashAndSpace);

            //update product
            product::where('id', $request->product_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'image' => 'product_image/'.$image_name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'slug' => $slug,
                'updated_at' => carbon::now(),
            ]);
        }
        return redirect('/view/product/page/');
    }
}
