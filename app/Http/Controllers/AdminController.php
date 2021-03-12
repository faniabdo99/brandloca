<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Product_Variation;
use App\Order;
class AdminController extends Controller{
    public function getHome(){
      $TotalProductsCount = Product::count();
      $TotalUsersCount = User::count();
      $LatestOrders = Order::where('status' , '!=' , 'Complete')->latest()->limit(10)->get();
      //This Month Sales
      $MonthSales = Order::where('status' , 'Complete')->whereMonth('created_at',date('m'))->sum('total_amount');
      //Low Inventory Products
      $LowInvProductsQuery = Product_Variation::where('inventory' , '<' , 5)->count();
      return view('admin.index' , compact('TotalProductsCount' , 'MonthSales' ,'TotalUsersCount','LowInvProductsQuery','LatestOrders'));
    }
}
