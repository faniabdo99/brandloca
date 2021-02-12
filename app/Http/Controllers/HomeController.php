<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cookie;
use App\Product;
class HomeController extends Controller{
    public function getHomepage(){
      if(Cookie::has('guest_id')){
      }else{
        Cookie::queue(Cookie::make('guest_id', md5(rand(1,500))));
      }
      $NewProducts = Product::latest()->where('status' , '!=' , 'Invisible')->where('is_promoted','!=',1)->limit(15)->get();
      $PromotedProducts = Product::latest()->where('status' , '!=' , 'Invisible')->where('is_promoted',1)->limit(15)->get();
      return view('home', compact('NewProducts' , 'PromotedProducts'));
    }
}
