<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
   use HasFactory;

    protected $fillable = ["userid","name","details","category","price","quantity","image"];

    public function users(){
        return $this->belongsTo(User::class,'userid','id');
    }

}
