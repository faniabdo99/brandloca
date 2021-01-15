<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Str;
class Category extends Model{
    protected $guarded = [];
    public function getShortDescriptionAttribute(){
        return Str::limit($this->description , 60);
    }
}
