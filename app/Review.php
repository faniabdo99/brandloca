<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    protected $guarded = [];
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
