<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PagesController extends Controller{
    public function getContact(){
        return view('contact');
    }
    public function getCheckout(){
        return view('checkout');
    }
    public function getCategoryPage(){
        return view('category');
    }
}
