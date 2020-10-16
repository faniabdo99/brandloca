<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller{
    public function getHomepage(){
      $NewProducts = Product::latest()->where('is_promoted','!=',1)->limit(6)->get();
      $PromotedProducts = Product::latest()->where('status' , '!=' , 'Invisible')->where('is_promoted',1)->limit(8)->get();
      return view('home', compact('NewProducts' , 'PromotedProducts'));
    }

    public function getProductPage(){
        return view('product');
    }
}
