<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Cart;
use App\Product;
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
          //The Item is Available (Add to Cart)
          Cart::create($r->all());
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
}
