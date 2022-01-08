<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    private $units;
    private $unit;

    function index(){
        return view('admin.unit.add');
    }

    function create(Request $request){
        Unit::addNewUnit($request);
        return redirect()->back()->with('massage','New Unit Create Successfully');
    }


    function manage(){
        $this->units = Unit::orderBy('id','desc')->get();
        return view('admin.unit.manage',[
            'units'=> $this->units,
        ]);
    }

    function edit($id){
        $this->unit = Unit::find($id);
        return view('admin.unit.edit',[
            'unit' => $this->unit
        ]);
    }

    function update(Request $request, $id){
        Unit::UpdateUnit($request, $id);
        return redirect('/manage-unit')->with('massage','Unit Update Successfully');
    }


    function delete(Request $request, $id){
        Unit::deleteUnit($id);
        return redirect('/manage-unit')->with('massage','Unit Delete Successfully');
    }
}
