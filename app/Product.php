<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends Model{
    protected $guarded = [];
    //Relations Methods
    public function Category(){
        return $this->belongsTo(Category::class)->withDefault([
            'title' => 'Deleted Category',
            'slug' => 'deleted-category',
            'image' => 'category.png',
            'description' => 'Deleted Category'
        ]);
    }
    //Non-Relation Methods
    public function getIsActiveAttribute(){
        if($this->status == 'Available'){
            return true;
        }else{
            return false;
        }
    }
    public function getMainImageAttribute(){
        return url('storage/app/images/products').'/'.$this->image;
    }
    public function GalleryImages(){
        return $this->hasMany(Product_Image::class);
    }
    public function LikedByUser(){
        if(auth()->check()){
            $isLiked = Favourite::where('user_id' , auth()->user()->id)->where('product_id' , $this->id)->count();
            if($isLiked != 0){
                return true;
            }else{
                return false;
            }
        }
    }
    public function HasDiscount(){
        if($this->discount_id){
            $TheDiscount = Discount::find($this->discount_id);
            if($TheDiscount && Carbon::parse($TheDiscount->valid_until) > Carbon::today()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function getStatusClassAttribute(){
        $StatuesArray = [];
        if($this->status == 'Sold Out'){
            $StatuesArray['text'] = 'text-danger';
            $StatuesArray['background'] = 'bg-danger';
        }elseif($this->status == 'Available'){
            $StatuesArray['text'] = 'text-success';
            $StatuesArray['background'] = 'bg-success';
        }elseif($this->status == 'Pre-Order'){
            $StatuesArray['text'] = 'text-warning';
            $StatuesArray['background'] = 'bg-warning';
        }else{
            $StatuesArray['text'] = 'd-none';
            $StatuesArray['background'] = 'd-none';
        }
        return $StatuesArray;
    }

    public function AvailableVariations(){
      $Variations = Product_Variation::where('product_id' , $this->id)->where('inventory' , '>' , '0')->where('status' , 'Available')->get();
      $DataArray = [
        'sizes' => $Variations->pluck('size')->unique(),
        'color_codes' => $Variations->pluck('color_code')->unique(),
        'inevntory' => $Variations->sum('inventory')
      ];
      return $DataArray;
    }
}
