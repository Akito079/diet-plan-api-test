<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'email',
        'address'.
        'phone',
    ];
    public function invoices():HasMany
    {
        return $this->hasMany(Invoice::class);
    }
    public function reviews():HasMany
    {
        return $this->hasMany(Review::class);
    }
}
