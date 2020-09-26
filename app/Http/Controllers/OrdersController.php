<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Route;
class OrdersController extends Controller{
    public function getTrace(){
        return view('orders.trace');
    }
}
