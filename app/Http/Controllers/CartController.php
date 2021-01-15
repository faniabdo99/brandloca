<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Cart;
use App\User;
use App\Product;
use App\Coupoun;
use App\Coupoun_User;
use App\Product_Variation;
class CartController extends Controller{
    public function addToCart(Request $r){
      /*
        Add an Item to Cart
          #1 Check if the requested data available in inventory
          #2 Check if the item already exist, if so add to the current value
      */
      //Validate the Request
      $Rules = [
        'qty' => 'required|numeric',
        'color' => 'required',
        'size' => 'required',
        'user_id' => 'required|numeric',
        'product_id' => 'required|numeric'
      ];
      $ErrorMessages = [
        'qty.required' => 'يرجى اختيار الكمية المطلوبة',
        'qty.numeric' => 'يرجى اختيار الكمية المطلوبة',
        'color.required' => 'يرجى اختيار اللون المطلوب',
        'size.required' => 'يرجى اختيار الحجم المطلوب',
        'user_id.required' => 'يرجى تسجيل الدخول أولاَ',
        'user_id.numeric' => 'يرجى تسجيل الدخول أولاَ',
        'product_id.required' => 'حدث خطأ غير معروف , يرجى تحديث الصفحة و المحاولة مجدداً',
        'product_id.numeric' => 'حدث خطأ غير معروف , يرجى تحديث الصفحة و المحاولة مجدداً',
      ];
      $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
      if($Validator->fails()){
        return response($Validator->errors()->all() , 400);
      }else{
        //Check if the product is available in inventory
        $Inventory = Product_Variation::where('product_id' , $r->product_id)->where('color_code' , $r->color)->where('size' , $r->size)->where('inventory' , '>=' , $r->qty)->first();
        if($Inventory){
          //Update Current Cart if There is
          $CurrentCart = Cart::where('user_id' , $r->user_id)->where('status', 'active')->where('variation_id' , $Inventory->id)->first();
          if($CurrentCart){
            //Update the current cart
            $CurrentCart->update(['qty' => $CurrentCart->qty + $r->qty]);
          }else{
            //Create Cart Data
            $CartData = $r->all();
            $CartData['variation_id'] = $Inventory->id;
            //The Item is Available (Add to Cart)
            Cart::create($CartData);
          }
          //Decrease the inventory value for this product
          $Inventory->update([
            'inventory' => ($Inventory->inventory - $r->qty)
          ]);
          return response('تم اضافة هذا المنتج الى سلة التسوق بنجاح' , 200);
        }else{
          return response('هذا المنتج غير متوفر للبيع حالياً' , 400);
        }
      }
    }
    public function getCart(){
        $CartItems = Cart::where('user_id' , auth()->user()->id)->where('status' , 'active')->get();
        $HasCoupon = 0;
        if($CartItems->count() >= 1){
          $HasCoupon = $CartItems->first()->applied_coupon;
        }
        $CartArray = $CartItems->map(function($item){
          return $item->TotalPrice;
        })->toArray();
        $CartTotal = array_sum($CartArray);
        if($HasCoupon){
          $TheCoupon = Coupoun::find($HasCoupon);
          if($TheCoupon->discount_type == 'percent'){
            $CartTotal = $CartTotal - (($CartTotal * $TheCoupon->discount_amount) / 100);
          }else{
            $CartTotal = intval($CartTotal - $TheCoupon->discount_amount);
            if($CartTotal < 0){
              $CartTotal = 0;
            }
          }
        }
        return view('orders.cart' , compact('CartItems' , 'CartTotal' , 'HasCoupon'));
    }
    public function ApplyCoupon(Request $r){
      //Check if the coupon code are valid
      $TheCoupon = Coupoun::where('coupoun_code' , $r->cuopon_code)->where('amount' , '>=' , 1)->first();
      if(!$TheCoupon){ return response('This Coupon Code is Invalid!' , 404); }
      //Check the user
      $TheUser = User::where('id',$r->user_id)->first();
      if($TheUser){
        //Check the Cart
        $TheCart = Cart::where('user_id' , $TheUser->id)->where('status' , 'active')->get();
        if($TheCart->count() >= 1){
          //The Cart, User and Coupon Data are Valid
          //Check if User Already Used This Copoun
          if(Coupoun_User::where('user_id' , $r->user_id)->where('coupoun_id' ,$TheCoupon->id)->count() >= 1){
            return response('You Already Used This Coupon!' , 403);
          }else{
            //Apply The Copun to the Cart Items
            $TheCart->map(function($item) use ($TheCoupon){
                $item->update([
                  'applied_coupon' => $TheCoupon->id
                ]);
            });
            //Decrease the Coupon Count
            $TheCoupon->update(['amount' => ($TheCoupon->amount - 1)]);
            //Add a Usage Record
            Coupoun_User::create([
              'user_id' => $r->user_id,
              'coupoun_id' => $TheCoupon->id
            ]);
            return response('Your Coupon Code Has Been Applied! ' , 200);
          }

        }else{
          return response('You Don\'t Have Anything in Your Cart!' , 400);
          exit();
        }
      }else{
        return response('The User Data is Invalid!' , 400);
        exit();
      }
      dd($r->all());
    }
    public function deleteCuopon($user_id , $cuopon_id){
      $TheCart = Cart::where('user_id' , $user_id)->where('status' , 'active')->where('applied_coupon' , '=' , $cuopon_id)->update([
        'applied_coupon' => null
      ]);
      //Remove the usage record
      Coupoun_User::where('user_id' , $user_id)->where('coupoun_id' , $cuopon_id)->first()->delete();
      //add a cuopon amount
      Coupoun::find($cuopon_id)->increment('amount' , 1);
      return back()->withSuccess('تم الغاء الكوبون بنجاح!');
    }
    public function deleteFromCart($id){
      $Item = Cart::findOrFail($id);
      //Check the user who owns it
      if($Item->user_id == auth()->user()->id){
        //Return The Product Original Qty Value (to the variation)
        $Item->Variation->update(['inventory' => $Item->Variation->inventory + $Item->qty]);
        $Item->update(['status' => 'Deleted']);
        return back()->withSuccess('تم ازالة هذا العنصر من قائمة التسوق');
      }else{
        return back()->withErrors('لا يمكنك ازالة هذا العنصر!');
      }
    }
    public function updateCart(Request $r , $item , $user){
      //Validate the request
      $Rules = [
        'qty' => 'required|numeric'
      ];
      $ErrorMessages = [
        'qty.required' => 'عليك تحديد الكمية المطلوبة !',
        'qty.numeric' => 'يجب أن تكون الكمية المطلوبة رقم صحيح !',
      ];
      $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
      if($Validator->fails()){
        return response($Validator->errors()->first() , 403);
      }else{
        //Check the owner and the item
        $Cart = Cart::findOrFail($item);
        if($Cart && $Cart->user_id == $user){
          //Check if inventory have enough
          $Product = Product_Variation::findOrFail($Cart->variation_id);
          if($r->qty == 0){
            $Product->update(['inventory' => $Product->inventory + $Cart->qty ]);
            $Cart->delete();
            return response('تم التعديل بنجاح' , 200);
          }
          if($Product->inventory >= $r->qty){
            //Update and Reduce the Variation
            if($Cart->qty > $r->qty){ // Do a Minus
              $Product->update(['inventory' => $Product->inventory + ($Cart->qty - $r->qty) ]);
            }else{
              $Product->update(['inventory' => $Product->inventory - abs($Cart->qty - $r->qty) ]);
            }
            $Cart->update(['qty' => $r->qty ]);
            return response('تم التعديل بنجاح' , 200);
          }else{
              return response('لا يمكنك شراء أكثر من '.$Product->inventory.' قطعة' , 403);
          }
        }else{
          return response('لا يوجد عنصر في السلة بهذه المعلومات', 403);
        }
      }
      dd($r->all());
    }
}
