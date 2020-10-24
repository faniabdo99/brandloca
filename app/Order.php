<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    protected $guarded = [];
    public function User(){
      return $this->belongsTo(User::class , 'user_id');
    }
    public function Items(){
      return $this->hasMany(Order_Product::class , 'order_id');
    }
    public function getTotalAttribute(){return $this->total_amount;}
    public function getTotalShippingAttribute(){return $this->total_shipping_cost;}
    public function getFinalTotalAttribute(){return $this->total + $this->total_shipping;}

}
