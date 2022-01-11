<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
class CheckoutController extends Controller
{

    public function index(){
        return view('front.checkout.checkout',[
            'cartProducts' => Cart::content(),
        ]);
    }
}
