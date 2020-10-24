<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use Validator;
//Models
use App\Cart;
use App\Order;
use App\Coupoun;
use App\Order_Product;

class OrdersController extends Controller{
    public function getCheckout(){
        $CartItems = Cart::where('user_id', auth()->user()->id)->where('status', 'active')->get();
        $HasCoupon = 0;
        if ($CartItems->count() >= 1) {
            $HasCoupon = $CartItems->first()->applied_coupon;
        }
        $CartArray = $CartItems->map(function ($item) {
            return $item->TotalPrice;
        })->toArray();
        $CartOrigin = array_sum($CartArray);
        $CartTotal = array_sum($CartArray);
        if ($HasCoupon) {
            $TheCoupon = Coupoun::find($HasCoupon);
            if ($TheCoupon->discount_type == 'percent') {
                $CartTotal = $CartTotal - (($CartTotal * $TheCoupon->discount_amount) / 100);
            } else {
                $CartTotal = intval($CartTotal - $TheCoupon->discount_amount);
                if ($CartTotal < 0) {
                    $CartTotal = 0;
                }
            }
        }
        return view('orders.checkout', compact('CartItems', 'CartOrigin','CartTotal', 'HasCoupon' , 'TheCoupon'));
    }
    public function postCheckout(Request $r){
      //Validate the request
      $Rules = [
        'name' => 'required',
        'phone_number' => 'required|numeric',
        'phone_number_2' => 'required|numeric',
        'email' => 'required|email|confirmed',
        'province' => 'required',
        'city' => 'required',
        'zip_code' => 'required',
        'street_address' => 'required',
        'shipping_province' => 'required',
        'shipping_city' => 'required',
        'shipping_zip_code' => 'required',
        'shipping_street_address' => 'required',
        'payment_method' => 'required'
      ];
      $Validator = Validator::make($r->all() , $Rules);
      if($Validator->fails()){
        return back()->withErrors($Validator->errors()->all())->withInput();
      }else{
        //Redirect to login if not already logged in
        if(!auth()->check()){return redirect()->route('login.get');}
        //Check the payment method value
        $ViablePaymentMethods = ['pod','vodafone-cash','credit-card'];
        if(in_array($r->payment_method, $ViablePaymentMethods)){
          //Create the order
          $OrderData = $r->except(['_token','email_confirmation']);
          $OrderData['status'] = 'Awaits Payment';
          $OrderData['lang'] = 'ar_EG';
          $OrderData['is_paid'] = 0;
          $OrderData['total_shipping_cost'] = 5;
          $OrderData['user_id'] = auth()->user()->id;
          $TheOrder = Order::create($OrderData);
          //Create order-products record
          $CartItems = Cart::where('user_id', auth()->user()->id)->where('status', 'active')->get();
          $CartItems->map(function($item) use ($TheOrder){
            Order_Product::create([
              'order_id' => $TheOrder->id,
              'product_id' => $item->product_id,
              'is_free_shipping' => 0,
              'qty' => $item->qty,
              'variation_id' => $item->variation_id
            ]);
            $item->update(['status' => 'complete']);
          });
          //Redirect to payment gatway

          return redirect()->route('order.complete' , $TheOrder->id);
        }else{
          return back()->withErrors('طريقة الدفع غير متاحة')->withInput();
        }
      }
    }
    public function getOrderComplete($id){
      $TheOrder = Order::findOrFail($id);
      return view('orders.complete', compact('TheOrder'));
    }
    public function getTrace(){
        return view('orders.trace');
    }




    //Admin Only Methods
    public function getHome(){
      $Orders = Order::latest()->get();
      return view('admin.orders.index' , compact('Orders'));
    }
    public function getSingleOrder($id){
      $TheOrder = Order::findOrFail($id);
      return view('admin.orders.single' , compact('TheOrder'));
    }
  public function updateOrderStatus(Request $r, $id){
    //Find The Order
    $TheOrder = Order::findOrFail($id);
    if($TheOrder){
        //Vlidate the Request
        $Rules = [
          'order_status' => 'required',
          'tracking_link' => 'nullable|url'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
          return back()->withErrors($validator->errors()->all());
        }else{
          //Updat the Order
          $TheOrder->update([
            'status' => $r->order_status,
            'tracking_link' => $r->tracking_link
          ]);
          //Send an Email to The User
          Mail::to($TheOrder->email)->send(new OrderStatusUpdateMail($TheOrder));
          return back()->withSuccess('Order Updated Successfully');
        }
    }else{
      return back()->withErrors('Order is Not Available');
    }
  }
}
