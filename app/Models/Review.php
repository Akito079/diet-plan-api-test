<?php

namespace App\Models;

use App\Models\Meal;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','meal_id','message','rating'];

    public function meals():BelongsTo
    {
        return $this->belongsTo(Meal::class,'meal_id','id');
    }
    public function customers():BelongsTo
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

}
