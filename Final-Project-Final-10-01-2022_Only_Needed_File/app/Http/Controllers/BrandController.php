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

    function create(Request $request){
        Brand::addNewBrand($request);
        return redirect()->back()->with('massage','New Brand Create Successfully');
    }


    function manage(){
        $this->brands = Brand::orderBy('id','desc')->get();
        return view('admin.brand.manage',[
            'brands'=> $this->brands,
        ]);
    }

    function edit($id){
        $this->brand = Brand::find($id);
        return view('admin.brand.edit',[
            'brand' => $this->brand
        ]);
    }

    function update(Request $request, $id){
        Brand::UpdateBrand($request, $id);
        return redirect('/manage-brand')->with('massage','Brand Update Successfully');
    }


    function delete(Request $request, $id){
        Brand::deleteBrand($id);
        return redirect('/manage-brand')->with('massage','Brand Delete Successfully');
    }

}
