<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products;
    private $product;
    private $categoryID;
    private $categories;
    private $subCategories;
    private $brands;
    private $units;

    function index(){
        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();
        return view('admin.product.add',[
            'categories'    => $this->categories,
            'subCategories' => $this->subCategories,
            'brands'        => $this->brands,
            'units'         => $this->units,
        ]);
    }


    function create(Request $request){

        $this->product = Product::addNewProduct($request);
        SubImage::newSubImg($this->product, $request);
        return redirect()->back()->with('massage','New Product Create Successfully');
    }


    function manage(){
        $this->products = Product::orderBy('id','desc')->get();
        return view('admin.category.manage',[
            'products'=> $this->products,
        ]);
    }

    function edit($id){
        $this->product = Product::find($id);
        return view('admin.product.edit',[
            'product' => $this->product
        ]);
    }

    function update(Request $request, $id){

        Product::UpdateProduct($request, $id);
        return redirect('/manage-product')->with('massage','Product Update Successfully');
        
    }


    function delete(Request $request, $id){
        Product::deleteProduct($id);
        return redirect('/manage-product')->with('massage','Product Delete Successfully');
    }


    public function getSubCategoryByID(){

        $subCategory =  SubCategory::where('category_id', $_GET['id'])->get();
        return json_encode($subCategory);
    }

}
