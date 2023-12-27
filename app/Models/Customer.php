<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'email',
        'address'.
        'phone',
    ];
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
