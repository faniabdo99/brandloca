<?php
use Illuminate\Support\Facades\Cookie;
//Models
use App\Category;
//List The Categories
function CategoriesList(){
  return App\Category::latest()->get();
}
//Get Size Text From Code Name
function getSizeText($code_name){
  $SizesArray = [
    'mini_bb' => 'ميني ب.ب',
    'bb' => 'ب.ب 1-4 سنة',
    'medium' => 'وسط 5-9 سنة',
    'adult' => 'محير 10-16 سنة',
    'older' => 'كبار 16+ سنة',
  ];
  return $SizesArray[$code_name];
}
//Get Season Text From Code Name
function getSeasonText($Season){
  $Seasons = [
    'summer' => 'صيف',
    'winter' => 'شتاء'
  ];
  return $Seasons[$Season];
}
//Get Type Text From Code Name
function getTypeText($Type){
  $Types = [
    'pajama' => 'بيجاما / ترينج',
    'tshirt' => 'تيشرت',
    'pants' => 'بنطال',
    'shoes' => 'أحذية'
  ];
  return $Types[$Type];
}
//Get Category Data From ID
function getCategoryFromId($Id){
  $Category = Category::find($Id);
  if($Category != null){
    $Retun = $Category->toArray();
  }else{
    $Retun = [
      'id' => 0,
      'title' => 'No Data',
      'slug' => 'no-data',
      'image' => 'no-data.png',
      'description' => 'No Data'
    ];
  }
  return $Retun;
}
function formatPrice($amount){
  return  sprintf("%.2f",$amount);
}
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}
function productImagePath($image_name){
    return public_path('images/products/'.$image_name);
}
