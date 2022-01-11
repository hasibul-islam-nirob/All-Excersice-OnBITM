<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class SubCategory extends Model
{
    use HasFactory;

    private static $subCategory;

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
            self::$directory = 'sub-category-images/';
            self::$image-> move(self::$directory, self::$imageName );
            return self::$directory.self::$imageName;
        }else{
            return '';
        }
    }

    public static function addNewSubCategory($request){
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id    = $request->category_id;
        self::$subCategory->name           = $request->name;
        self::$subCategory->description    = $request->description;
        self::$subCategory->status         = $request->status;
        self::$subCategory->image          = self::getImgURL($request);
        self::$subCategory->save();
    }

    public static function UpdateSubCategory($request, $id){
        self::$subCategory = SubCategory::find($id);

        self::$image = $request->file('image');
        if (self::$image) {
            if (file_exists(self::$subCategory->image)) {
                unlink(self::$subCategory->image);
            }
            self::$imgURL = self::getImgURL($request);
        } else {
            self::$imgURL = self::$subCategory->image;
        }

        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name        = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->status      = $request->status;
        self::$subCategory->image       = self::$imgURL;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($id){
        self::$subCategory = SubCategory::find($id);

        if (file_exists(self::$subCategory->image)){
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }


//    // Way 1
//    public function Category(){
//        return $this->belongsTo(Category::class);
//    }
////    // Way 2
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    //hasOne -> 1 to 1
    //belongsTo -> 1 to 1
    public function products(){
        return $this->hasMany('App\Models\Product');
    }


}
