<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','tags','image','price','rating','review_count'];

    public function reviews(){
        $this->hasMany(Review::class);
    }
}
