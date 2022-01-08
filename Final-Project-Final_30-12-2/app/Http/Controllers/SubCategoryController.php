<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $subCategories;
    private $subCategory;
    private $categories;

    function index(){
         $this->categories = Category::all();
        return view('admin.sub-category.add',[
            'categories' => $this->categories,
        ]);
    }

    function create(Request $request){
        SubCategory::addNewSubCategory($request);
        return redirect()->back()->with('massage','New Sub Category Create Successfully');
    }


    function manage(){
        $this->subCategories = SubCategory::orderBy('id','desc')->get();
        return view('admin.sub-category.manage',[
            'subCategories'=> $this->subCategories,
        ]);
    }


    function edit($id){
        $this->subCategory = SubCategory::find($id);
        $this->categories = Category::all();
        return view('admin.sub-category.edit',[
            'subCategory' => $this->subCategory,
            'categories' => $this->categories,
        ]);
    }

    function update(Request $request, $id){
        SubCategory::UpdateSubCategory($request, $id);
        return redirect('/manage-sub-category')->with('massage','Sub Category Update Successfully');
    }


    function delete(Request $request, $id){
        SubCategory::deleteSubCategory($id);
        return redirect('/manage-sub-category')->with('massage','Sub-Category Delete Successfully');
    }

}
