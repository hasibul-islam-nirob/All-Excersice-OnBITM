<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subCategory;

    public static function addSubCategory($request){
        self::$subCategory = new SubCategory();

        self::$subCategory->category_id                 = $request->category_id;
        self::$subCategory->sub_category_name           = $request->sub_category_name;
        self::$subCategory->sub_category_description    = $request->sub_category_description;
        self::$subCategory->status                      = $request->status;
        self::$subCategory->save();
    }

    public static function updateSubCategory($request, $id){
        self::$subCategory = SubCategory::find($id);
        self::$subCategory->category_id                 = $request->category_id;
        self::$subCategory->sub_category_name           = $request->sub_category_name;
        self::$subCategory->sub_category_description    = $request->sub_category_description;
        self::$subCategory->status                      = $request->status;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($id){
        self::$subCategory = SubCategory::find($id);
        self::$subCategory->delete();
    }

    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }


}
