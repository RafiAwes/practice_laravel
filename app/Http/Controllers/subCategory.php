<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\SCategory;
use App\Category;
use carbon\carbon;

class subCategory extends Controller
{
    public function subCategoryPage(){
        $categories= Category::all();
        $subcategories= DB::table('s_categories')
            ->join('categories','s_categories.category_id','=','categories.id')
            ->select('s_categories.*','categories.category_name')
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('backend.subCategory', compact('categories','subcategories'));
    }

    public function insertSubCategory(Request $request){

        $validatedData = $request->validate([
            'subCategory_name' => 'required|min:3',
        ]);

        SCategory::insert([
            'category_id'=> $request->category_id,
            'subcategory_name'=> $request->subCategory_name,
            'created_at'=> $request->carbon.now(),
        ]);

        Toastr::success('Successfully added', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }

    public function deleteSubcat($id){
        SCategory::where('id',$id)->delete();
        Toastr::success('Successfull Deleted', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function editSubcat($id){
        $category= Category::all();
        $subcategory= SCategory::where('id',$id)->first();
        return view('backend.editSubCategory', ['category'=>$category, 'subcategory'=>$subcategory]);
    }

    public function categoryDropDown($id){
        $category= Category::all();
        return request->json($category);
    }

    public function updateCategory(Request $request){
        
        $validatedData = $request->validate([
            'subcategory_name' => 'required|min:3',
        ]);
        SCategory::where('id',$request->subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
        ]);
        Toastr::success('Data Updated','Updated',["positionClass" => "toast-top-right"]);
        return redirect('/sub-category/');
    }
}
