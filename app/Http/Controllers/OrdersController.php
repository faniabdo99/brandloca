<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use Validator;
use Mail;
use Http;
//Models
use App\Cart;
use App\Order;
use App\Coupoun;
use App\Order_Product;
//Mails
use App\Mail\OrderCreatedMail;
class OrdersController extends Controller{
  //Admin Panel Realted
    public function getCheckout(){
        $CartItems = Cart::where('user_id', getUserId())->where('status', 'active')->get();
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
        }else{
          $TheCoupon = null;
        }
        return view('orders.checkout', compact('CartItems', 'CartOrigin','CartTotal', 'HasCoupon' , 'TheCoupon'));
    }
    public function postCheckout(Request $r){
      //Validate the request
      $Rules = [
        'name' => 'required',
        'phone_number' => 'required|numeric',
        'email' => 'required|email',
        'province' => 'required',
        'city' => 'required',
        'street_address' => 'required',
        'payment_method' => 'required'
      ];
      $Validator = Validator::make($r->all() , $Rules);
      if($Validator->fails()){
        return back()->withErrors($Validator->errors()->all())->withInput();
      }else{
        //Check the payment method value
        $ViablePaymentMethods = ['pod','vodafone-cash','credit-card'];
        if(in_array($r->payment_method, $ViablePaymentMethods)){
          //Create the order
          $OrderData = $r->except(['_token','email_confirmation']);
          $OrderData['status'] = 'Awaits Payment';
          $OrderData['lang'] = 'ar_EG';
          $OrderData['is_paid'] = 0;
          $OrderData['total_shipping_cost'] = 5;
          $OrderData['user_id'] = getUserId();
          $OrderData['tracking_number'] = mt_rand(10000000, 99999999);
          $TheOrder = Order::create($OrderData);
          //Send Email to the user
          Mail::to($TheOrder->email)->send(new OrderCreatedMail($TheOrder));
          //Create order-products record
          $CartItems = Cart::where('user_id', getUserId())->where('status', 'active')->get();
          $CartItems->map(function($item) use ($TheOrder){
            Order_Product::create([
              'order_id' => $TheOrder->id,
              'user_id' => $TheOrder->user_id,
              'product_id' => $item->product_id,
              'is_free_shipping' => 0,
              'qty' => $item->qty,
              'variation_id' => $item->variation_id
            ]);
            $item->update(['status' => 'complete']);
          });
        //Redirect to payment gatway
        if($TheOrder->payment_method == 'credit-card'){
          //Create Order Items Variable
          $OrderItems = [];
          foreach($TheOrder->Items() as $Item){
              array_push($OrderItems ,[
                'name' => $Item->Variation->ref_code,
                'amount_cents' => $Item->Product->price * 100,
                'description' => $Item->Product->title,
                'quantity' => $Item->qty
            ]);
            }
          $response = Http::post('https://accept.paymobsolutions.com/api/auth/tokens',[
            'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SnVZVzFsSWpvaWFXNXBkR2xoYkNJc0ltTnNZWE56SWpvaVRXVnlZMmhoYm5RaUxDSndjbTltYVd4bFgzQnJJam8yTURjeU4zMC5WYXUwVXNKS1UwNHV5cXF0VTFtN1lUdUtUQ2NfNkxqQk9RNlVJOTdjQU15OFk4d0JJU0ZMVlE4QnlraU9nbURzMWJfVUxZNkpuam9XMVdsXzlaa2xjdw==',
          ]);
          $ParseJson = json_decode($response->body());
          $Token = $ParseJson->token;
          //Send Order Request
          $OrderRequest = Http::post('https://accept.paymobsolutions.com/api/ecommerce/orders' , [
            'auth_token' => $Token,
            'delivery_needed' => true,
            'amount_cents' => ($TheOrder->FinalTotal * 100),
            'currency' => 'EGP',
            'merchant_order_id'=> $TheOrder->id,
            'items' => $OrderItems,
            'shipping_data' => [
                'email' => $TheOrder->email, 
                'first_name' => $TheOrder->name, 
                'street' => $TheOrder->street_address, 
                'phone_number' => $TheOrder->phone_number, 
                'postal_code' => 12511, 
                'city' => $TheOrder->city, 
                'country' => 'EG', 
                'state' => $TheOrder->province,
                'notes' => $TheOrder->order_notes,
                'last_name' => ' Nicolas'
              ]
          ]);
          $PaymobOrderID = json_decode($OrderRequest)->id;
          //Order Created
          $PaymentRequest = Http::post('https://accept.paymobsolutions.com/api/acceptance/payment_keys' , [
            'auth_token' => $Token,
            'delivery_needed' => true,
            'order_id' => $PaymobOrderID,
            'expiration' => 3600, 
            'amount_cents' => ($TheOrder->FinalTotal * 100),
            'currency' => 'EGP',
            'integration_id'=> 155229,
            'billing_data' => [
                'apartment' => 803, 
                'floor' => 42, 
                'building' => 8028, 
                'last_name' => ' Nicolas',   
                'email' => $TheOrder->email, 
                'first_name' => $TheOrder->name, 
                'street' => $TheOrder->street_address, 
                'phone_number' => $TheOrder->phone_number, 
                'postal_code' => 12511, 
                'city' => $TheOrder->city, 
                'country' => 'EG', 
                'state' => $TheOrder->province,
              ]
          ]);
          $PaymentToken = json_decode($PaymentRequest->body());
          $FrameID = 154258;
          $PaymentID = $PaymentToken->token;
          return view('pay' , compact('FrameID','PaymentID'));
        }
          return redirect()->route('order.complete' , $TheOrder->id);
        }else{
          return back()->withErrors('?????????? ?????????? ?????? ??????????')->withInput();
        }
      }
    }
    public function getOrderComplete($id){
      $TheOrder = Order::findOrFail($id);
      return view('orders.complete', compact('TheOrder'));
    }
    public function getOrderSuccess(Request $r){
      $TheOrder = Order::findOrFail($r->merchant_order_id);
      if($r->success == 'true'){
        //Update the Order
        $TheOrder->update([
          'status' => 'Paid',
          'payment_id' => $r->id,
          'is_paid' => 1
        ]);
      }
      return view('orders.complete', compact('TheOrder'));
    }
    public function getTrace(){
        return view('orders.trace');
    }
    public function postTrace(Request $r){
      //Validate the request
      if(!isset($r->tracking_number) || strlen($r->tracking_number) != 8 || !is_numeric($r->tracking_number)){
        return response('???????? ?????? ???????????? ?????? ??????????!' , 422);
      }
      $TheOrder = Order::where('tracking_number' , $r->tracking_number)->first();
      if($TheOrder){
        if($r->user_id != 0){
          if($TheOrder->user_id != $r->user_id){
            return response('?????? ???????? ???????????????? ???????? ?????? ??????????!' , 403);
          }
        }
        $Resultes = $TheOrder;
        if(isset($TheOrder->user_id)){
          $Resultes['name'] = $TheOrder->User->name;
        }else{
          $Resultes['name'] = $TheOrder->name;
        }
        $Resultes['total'] = $TheOrder->FinalTotal;
        $Resultes['items'] = $TheOrder->Items->count();
        $Resultes['payment_method_text'] = $TheOrder->PaymentMethodText;
        $Resultes['order_date'] = $TheOrder->created_at->format('Y-m-d');
        return response($Resultes,200);
      }else{
        return response('???? ???????? ?????? ?????????? ???????? ???????????? ???????? ????????????',404);
      }
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
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
          return back()->withErrors($validator->errors()->all());
        }else{
          //Updat the Order
          $TheOrder->update([
            'status' => $r->order_status,
          ]);
          //Send an Email to The User
          // Mail::to($TheOrder->email)->send(new OrderStatusUpdateMail($TheOrder));
          return back()->withSuccess('Order Updated Successfully');
        }
    }else{
      return back()->withErrors('Order is Not Available');
    }
  }
  public function delete($id){
    Order_Product::where('order_id' , $id)->get()->map(function($item){
      $item->delete();
    });
    Order::findOrFail($id)->delete();
    return back()->withSuccess('Order Deleted');
  }
}
