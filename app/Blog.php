<?php
namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    use HasFactory;
    protected $guarded = [];
    public function getImageSrcAttribute(){
        return url('storage/app/images/blog').'/'.$this->image;
    }
}
