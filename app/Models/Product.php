<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'amount',
        'user_id'
    ];

    public function products()
    {
    return $this->hasMany(Product::class);
    }

    use HasFactory;
}
