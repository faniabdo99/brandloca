<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Coupoun extends Model{
    protected $guarded = [];
    public function TypeSymbole(){
      if($this->discount_type == 'percent'){
        return "%";
      }else{
        return "L.E";
      }
    }
}
