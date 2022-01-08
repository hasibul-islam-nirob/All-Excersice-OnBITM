<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand;

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
            self::$directory = 'brand-images/';
            self::$image-> move(self::$directory, self::$imageName );
            return self::$directory.self::$imageName;
        }else{
            return '';
        }
    }

    public static function addNewBrand($request){
        self::$brand = new Brand();
        self::$brand->name           = $request->name;
        self::$brand->description    = $request->description;
        self::$brand->status         = $request->status;
        self::$brand->image          = self::getImgURL($request);
        self::$brand->save();
    }

    public static function UpdateBrand($request, $id)
    {
        self::$brand = Brand::find($id);

        self::$image = $request->file('image');
        if (self::$image) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$imgURL = self::getImgURL($request);
        } else {
            self::$imgURL = self::$brand->image;
        }

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;
        self::$brand->image = self::$imgURL;
        self::$brand->save();
    }

    public static function deleteBrand($id){
        self::$brand = Brand::find($id);

        if (file_exists(self::$brand->image)){
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }



}
