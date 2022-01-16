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
    private static $directory;
    private static $extension;
    private static $imageUrl;

    public static function getImageUrl($request){
        self::$image = $request->file('product_image');
        if(self::$image) {
            self::$extension = self::$image->getClientOriginalExtension();
            self::$imageName = time().'.'.self::$extension;
            self::$directory = 'product-images/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
        } else {
            return '';
        }
    }

    public static function addProduct($request){
        self::$product = new Product();
        self::$product->category_id         = $request->category_id;
        self::$product->sub_category_id     = $request->sub_category_id;
        self::$product->brand_id            = $request->brand_id;
        self::$product->product_name        = $request->product_name;
        self::$product->product_quantity    = $request->product_quantity;
        self::$product->product_code        = $request->product_code;
        self::$product->regular_price       = $request->regular_price;
        self::$product->selling_price       = $request->selling_price;
        self::$product->short_description   = $request->short_description;
        self::$product->long_description    = $request->long_description;
        self::$product->product_image       = self::getImageUrl($request);
        self::$product->status              = $request->status;
        self::$product->save();
        return self::$product;
    }

    public static function updateProduct($request, $id){
        self::$product = Product::find($id);

        self::$image = $request->file('product_image');
        if(self::$image) {
            if(file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = self::$product->image;
        }

        self::$product->category_id         = $request->category_id;
        self::$product->sub_category_id     = $request->sub_category_id;
        self::$product->brand_id            = $request->brand_id;
        self::$product->product_name        = $request->product_name;
        self::$product->product_quantity    = $request->product_quantity;
        self::$product->product_code        = $request->product_code;
        self::$product->regular_price       = $request->regular_price;
        self::$product->selling_price       = $request->selling_price;
        self::$product->short_description   = $request->short_description;
        self::$product->long_description    = $request->long_description;
        self::$product->product_image       = self::$imageUrl;
        self::$product->status              = $request->status;
        self::$product->save();
    }

    public static function deleteProduct($id){
        self::$product = Product::find($id);
        if(file_exists(self::$product->product_image)) {
            unlink(self::$product->product_image);
        }
        self::$product->delete();
    }

    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function subCategory(){
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function Brand(){
        return $this->belongsTo('App\Models\Brand');
    }
}
