<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    private static $product;

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
            self::$directory = 'product-images/';
            self::$image-> move(self::$directory, self::$imageName );
            return self::$directory.self::$imageName;
        }else{
            return '';
        }
    }

    public static function addNewProduct($request){
        self::$product = new Product();
        self::$product->category_id         = $request->category_id;
        self::$product->sub_category_id     = $request->sub_category_id;
        self::$product->brand_id            = $request->brand_id;
        self::$product->unit_id             = $request->unit_id;
        self::$product->name                = $request->name;
        self::$product->code                = $request->code;
        self::$product->regular_price       = $request->regular_price;
        self::$product->selling_price       = $request->selling_price;
        self::$product->short_description   = $request->short_description;
        self::$product->long_description    = $request->long_description;
        self::$product->status              = $request->status;
        self::$product->image               = self::getImgURL($request);
        self::$product->save();
        return self::$product;
    }

    public static function UpdateProduct($request, $id){
        self::$product = Product::find($id);

        self::$image = $request->file('image');
        if (self::$image){
            if (file_exists(self::$product->image)){
                unlink(self::$product->image);
            }
            self::$imgURL = self::getImgURL($request);
        }else{
            self::$imgURL = self::$product->image;
        }

        self::$product->category_id         = $request->category_id;
        self::$product->sub_category_id     = $request->sub_category_id;
        self::$product->brand_id            = $request->brand_id;
        self::$product->unit_id             = $request->unit_id;
        self::$product->name                = $request->name;
        self::$product->code                = $request->code;
        self::$product->regular_price       = $request->regular_price;
        self::$product->selling_price       = $request->selling_price;
        self::$product->short_description   = $request->short_description;
        self::$product->long_description    = $request->long_description;
        self::$product->image               = $request->image;
        self::$product->hit_count           = $request->hit_count;
        self::$product->sales_count         = $request->sales_count;
        self::$product->review_count        = $request->review_count;
        self::$product->status              = $request->status;
        self::$product->image               = self::getImgURL($request);
        self::$product->save();
    }

    public static function deleteProduct($id){
        self::$product = Product::find($id);

        if (file_exists(self::$product->image)){
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

}
