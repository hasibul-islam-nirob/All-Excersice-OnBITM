<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    private $categories;
    private $category;
    private $categoryID;

    function index(){
        return view('admin.category.add');
    }

    function create(Request $request){
        Category::addNewCategory($request);
        return redirect()->back()->with('massage','New Category Create Successfully');
    }


    function manage(){
        $this->categories = Category::orderBy('id','desc')->get();
        return view('admin.category.manage',[
            'categories'=> $this->categories,
        ]);
    }

    function edit($id){
        $this->category = Category::find($id);
        return view('admin.category.edit',[
            'category' => $this->category
        ]);
    }

    function update(Request $request, $id){
        Category::UpdateCategory($request, $id);
        return redirect('/manage-category')->with('massage','Category Update Successfully');
    }


    function delete(Request $request, $id){
        Category::deleteCategory($id);
        return redirect('/manage-category')->with('massage','Category Delete Successfully');
    }



}
