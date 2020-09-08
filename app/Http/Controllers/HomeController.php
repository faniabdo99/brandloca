<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller{
    public function getHomepage(){
        return view('home');
    }

    public function getProductPage(){
        return view('product');
    }
}
