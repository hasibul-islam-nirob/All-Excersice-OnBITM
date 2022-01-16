<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brands;
    private $brand;
    function index(){
        return view('admin.brand.add');
    }

    function addBrand(Request $request){
        Brand::addBrand($request);
        return redirect()->back()->with('message','Brand Added Successfully....!!');
    }

    function showAllBrand(){
        $this->brands = Brand::all();
        return view('admin.brand.manage',[
            'brands' => $this->brands,
        ]);
    }

    function deleteBrand($id){
        Brand::deleteBrand($id);
        return redirect('/manage-brand')->with('message','Brand Delete Successfully....!!');
    }

    function editBrandPage($id){
        $this->brand = Brand::find($id);
        return view('admin.brand.update',[
            'brand' => $this->brand
        ]);
    }
    function updateBrand(Request $request, $id){
        Brand::updateBrand($request, $id);
        return redirect()->back()->with('message','Brand Update Successfully....!!');
    }
}
