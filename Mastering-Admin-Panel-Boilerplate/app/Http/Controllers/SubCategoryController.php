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
//
//    function deleteCategory($id){
//        Category::categoryDelete($id);
//        return redirect('/manage-category')->with('message','Category Delete Successfully....!!');
//    }
//    function editCategoryPage($id){
//        $this->category = Category::find($id);
//        return view('admin.category.update',[
//            'category' => $this->category
//        ]);
//    }
//
//    function updateCategory(Request $request, $id){
//        Category::updateCategory($request, $id);
//        return redirect()->back()->with('message','Category Update Successfully....!!');
//    }
}
