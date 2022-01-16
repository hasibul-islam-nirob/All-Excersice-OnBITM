<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_subImages;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products;
    private $product;

    private $categories;
    private $subCategories;
    private $brands;

    function index(){
        return view('admin.product.add',[
            'categories'    => $this->categories    = Category::all(),
            'subCategories' => $this->subCategories = SubCategory::all(),
            'brands'        => $this->brands        = Brand::all(),
        ]);
    }

    function addProduct(Request $request){
        $this->product = Product::addProduct($request);
        Product_subImages::newSubImage($this->product, $request);
        return redirect()->back()->with('message','Product Added Successfully....!!');
    }

    function showAllProduct(){
        $this->products = Product::orderBy('id', 'desc')->get();
        return view('admin.product.manage',[
            'products' => $this->products
        ]);
    }

    function deleteProduct($id){
        Product::deleteProduct($id);
        return redirect('/manage-product')->with('message','Product Delete Successfully....!!');
    }

    function editProductPage($id){
        $this->product = Product::find($id);
        return view('admin.product.update',[
            'product' => $this->product,
            'categories'    => $this->categories    = Category::all(),
            'subCategories' => $this->subCategories = SubCategory::all(),
            'brands'        => $this->brands        = Brand::all(),
        ]);
    }
    function updateProduct(Request $request, $id){
        Product::updateProduct($request, $id);
        return redirect()->back()->with('message','Product Update Successfully....!!');
    }


}
