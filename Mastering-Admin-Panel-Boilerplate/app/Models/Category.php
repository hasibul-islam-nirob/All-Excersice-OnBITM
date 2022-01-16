<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;

    private static $category;
    private static $subCategory;

    public static function addCategory($request){
        self::$category = new Category();
        self::$category->category_name          = $request->category_name;
        self::$category->category_description   = $request->category_description;
        self::$category->status                 = $request->status;
        self::$category->save();
    }

    public static function updateCategory($request, $id){
        self::$category = Category::find($id);
        self::$category->category_name          = $request->category_name;
        self::$category->category_description   = $request->category_description;
        self::$category->status                 = $request->status;
        self::$category->save();
    }

    public static function categoryDelete($id){
        self::$category = Category::find($id);
        self::$category->delete();
    }


}
