<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category;

    private static $image;
    private static $imageName;
    private static $extension;
    private static $directory;
    private static $imgURL;

    public static function getImgURL($request){
        self::$image = $request->file('image');
        if (self::$image){
            self::$extension = self::$image->getClientOriginalExtension();
            self::$imageName = time().'.'.self::$extension;
            self::$directory = 'category-image/';
            self::$image-> move(self::$directory, self::$imageName );
            return self::$directory.self::$imageName;
        }else{
            return '';
        }
    }

    public static function addNewCategory($request){
        self::$category = new Category();
        self::$category->name           = $request->name;
        self::$category->description    = $request->description;
        self::$category->status         = $request->status;
        self::$category->image          = self::getImgURL($request);
        self::$category->save();
    }

    public static function UpdateCategory($request, $id){
        self::$category = Category::find($id);

        self::$image = $request->file('image');
        if (self::$image){
            if (file_exists(self::$category->image)){
                unlink(self::$category->image);
            }
            self::$imgURL = self::getImgURL($request);
        }else{
            self::$imgURL = self::$category->image;
        }

        self::$category->name           = $request->name;
        self::$category->description    = $request->description;
        self::$category->status         = $request->status;
        self::$category->image          = self::$imgURL;
        self::$category->save();
    }

    public static function deleteCategory($id){
        self::$category = Category::find($id);

        if (file_exists(self::$category->image)){
            unlink(self::$category->image);
        }
        self::$category->delete();
    }


    public function subCategory(){
       return $this->hasMany('App\Models\SubCategory');
    }

}
