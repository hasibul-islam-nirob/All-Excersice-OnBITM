<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $categories;
    private $subCategories;
    private $category;

    function index(){
        $this->categories = Category::all();
        return view('admin.sub-category.add',[
            'categories' => $this->categories
        ]);
    }

    function addSubCategory(Request $request){
        SubCategory::addSubCategory($request);
        return redirect()->back()->with('message','Sub-Category Add Successfully....!!');
    }

    function showAllsubCategory(){
        $this->subCategories = SubCategory::all();
        return view('admin.sub-category.manage',[
            'subCategories' => $this->subCategories
        ]);
    }

    function editSubCategoryPage($id){
        $this->subCategories = SubCategory::find($id);
        $this->categories = Category::all();
        return view('admin.sub-category.update',[
            'subCategories' => $this->subCategories,
            'categories' => $this->categories
        ]);
    }

    function updateSubCategory(Request $request, $id){
        SubCategory::updateSubCategory($request, $id);
        return redirect()->back()->with('message','Sub-Category Update Successfully....!!');
    }

    function deleteSubCategory($id){
        SubCategory::deleteSubCategory($id);
        return redirect('/manage-category')->with('message','Sub-Category Delete Successfully....!!');
    }

}
