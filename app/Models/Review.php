<?php

namespace App\Models;

use App\Models\Meal;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','meal_id','message'];

    public function meals(){
        $this->belongsTo(Meal::class);
    }
    public function customers(){
        $this->belongsTo(Customer::class);
    }

}
