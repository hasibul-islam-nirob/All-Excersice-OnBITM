<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MollaController extends Controller
{
    private $categories;

    public function index(){

        $this->categories= Category::all();
        return view('front.home.home',[
            'categories' =>$this->categories
        ]);
    }

    public function about(){
        return view('front.about.about');
    }

    public function contact(){
        return view('front.contact.contact');
    }

    public function categoryProduct(){
        return view('front.category.category');
    }

    public function productDetails(){
        return view('front.product.detail');
    }
    public function login(){
        return view('admin.login.login');
    }



}
