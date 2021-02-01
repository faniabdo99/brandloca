<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller{
    public function getHomepage(){
      $NewProducts = Product::latest()->where('status' , '!=' , 'Invisible')->where('is_promoted','!=',1)->limit(15)->get();
      $PromotedProducts = Product::latest()->where('status' , '!=' , 'Invisible')->where('is_promoted',1)->limit(15)->get();
      return view('home', compact('NewProducts' , 'PromotedProducts'));
    }
}
