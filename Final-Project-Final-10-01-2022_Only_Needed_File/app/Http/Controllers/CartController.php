<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    private $product;
    public function add(Request $request, $id){
        $this->product = Product::find($id);
        Cart::add([
            'id'        => $this->product->id,
            'name'      =>$this->product->name,
            'qty'       =>$request->qty,
            'price'     =>$this->product->selling_price,
            'weight'    =>0,
            'options'    =>[
                'image' => $this->product->image,
            ]
        ]);
        return redirect('/show-cart')->with('message','Product Added ');
    }

    public function show(){
        return view('front.cart.cart',[
            'categories'=>Category::all(),
            'cartProducts' => Cart::content(),
        ]);
    }

    public function update(Request $request, $id){
        Cart::update($id, $request->qty);
        return redirect()->back()->with('message','Product Cart Update Successful ');
    }

    public function delete($id){
        Cart::remove($id);
        return redirect()->back()->with('message','Product Delete Successful ');
    }



}
