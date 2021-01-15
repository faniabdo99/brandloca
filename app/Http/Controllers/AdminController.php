<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Product_Variation;
use App\Order;
class AdminController extends Controller{
    public function getHome(){
      $TotalProductsCount = Product::where('status' , 'Available')->count();
      $TotalUsersCount = Product::where('status' , 'Available')->count();
      $LatestOrders = Order::where('status' , '!=' , 'Complete')->limit(10)->get();
      //This Month Sales
      $MonthSales = Order::where('status' , 'Complete')->whereMonth('created_at',date('m'))->sum('total_amount');
      //Low Inventory Products
      $LowInvProductsQuery = Product_Variation::where('inventory' , '<' , 5)->count();
      return view('admin.index' , compact('TotalProductsCount' , 'MonthSales' ,'TotalUsersCount','LowInvProductsQuery','LatestOrders'));
    }
}
