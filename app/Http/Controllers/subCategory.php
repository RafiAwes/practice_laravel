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
            ->get();
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
        $categories= Category::all();
        $subcategories= DB::table('s_categories')
            ->join('categories','s_categories.category_id','=','categories.id')
            ->select('s_categories.*','categories.category_name')
            ->orderBy('id', 'asc')
            ->get();
        // $data['subcategories'] = SCategory::where('id',$id)->get();
        return view('backend.editSubCategory', compact('categories','subcategories'));
    }
}
