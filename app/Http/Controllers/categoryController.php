<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use carbon\carbon;
use App\product;
use App\Category;

class categoryController extends Controller
{
 public function categorypage()
 {
     $categories = Category::orderBy('id', 'asc')->paginate(5);
     return view('backend.category',compact('categories'));
 }

 public function addCategories(Request $request)
 {
     $validatedData = $request->validate([
         'category_name' => 'required|min:3',
     ]);
     if(Category::where('category_name',$request->category_name)->exists()){
         Toastr::warning('Category already exists', 'Ooops!', ["positionClass" => "toast-top-right"]);
         return back();
     }
     else{
         Category::insert([
             'category_name'=> $request->category_name,
             'created_at'=> carbon::now(),
         ]);

         Toastr::success('Successfully added', 'Success', ["positionClass" => "toast-top-right"]);
         return back();
     }

 }

 public function deleteCategory($id) {
    if(product::where('category_id',$id)->exists()){
        Toastr::warning('There is a product under this category. It can not be deleted', 'Notice',["positionClass" => "toast-top-right"]);
        return back();
    }
    else{
        Category::where('id',$id)->delete();
        Toastr::success('Category deleted', 'Deleted',["positionClass" => "toast-top-right"]);
        return back();
    }

 }

 public function editCategories($id){
     $data = Categories::where('id',$id)->first();
     return view('backend.editCategory',compact('data'));
 }

 public function updateCategory(Request $request){
     $validatedData = $request->validate([
         'category_name' => 'required|min:3',
     ]);

     Category::where('id', $request->category_id)->update([
         'category_name'=>$request->category_name,
     ]);
     Toastr::success('Category Updated', 'Updated',["positionClass" => "toast-top-right"]);
     return redirect('/category/');



 }
}
