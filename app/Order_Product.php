<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Order_Product extends Model{
    protected $guarded = [];
    public function Product(){
      return $this->belongsTo(Product::class , 'product_id')->withDefault([
        'title' => 'Deleted Product',
        'slug' => 'delete-product',
        'id' => 0
      ]);
    }
    public function Variation(){
      return $this->belongsTo(Product_Variation::class , 'variation_id')->withDefault([
        'ref_code' => 'delete-product'
      ]);
    }
}
