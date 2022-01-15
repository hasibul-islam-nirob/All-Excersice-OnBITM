<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;
    private $category;
    function index(){
        return view('admin.category.add');
    }

    function addCategory(Request $request){
        Category::addCategory($request);
        return redirect()->back()->with('message','Category Added Successfully....!!');
    }

    function showAllcategory(){
        $this->categories = Category::all();
        return view('admin.category.manage',[
            'categories' => $this->categories
        ]);
    }

    function deleteCategory($id){
       Category::categoryDelete($id);
       return redirect('/manage-category')->with('message','Category Delete Successfully....!!');
    }
    function editCategoryPage($id){
        $this->category = Category::find($id);
        return view('admin.category.update',[
            'category' => $this->category
        ]);
    }

    function updateCategory(Request $request, $id){
        Category::updateCategory($request, $id);
        return redirect()->back()->with('message','Category Update Successfully....!!');
    }



}
