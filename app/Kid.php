<?php
namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Kid extends Model{
  protected $guarded = [];
  use HasFactory;
  public function Parent(){
    return $this->belongsTo(User::class , 'parent_id');
  }
  public function getGenderTextAttribute(){
    if($this->gender == 'male'){
      return 'ذكر';
    }elseif($this->gender == 'female'){
      return 'أنثى';
    }else{
      return 'غير محدد';
    }
  }
  public function getAgeAttribute(){
    return Carbon::create($this->dob)->age;
  }
}
