<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Food extends Model
{
    use HasFactory,Notifiable,HasApiTokens;
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
