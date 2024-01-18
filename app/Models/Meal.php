<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','tags','image','price','rating'];

    public function reviews():HasMany
    {
      return  $this->hasMany(Review::class);
    }
    public function largestReview():HasOne{
        return $this->reviews()->one()->ofMany('rating','max');
    }
}
