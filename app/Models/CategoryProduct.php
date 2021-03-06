<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsToMany(Product::class, 'product_id', 'category_id');
    }

    public function category(){
        return $this->belongsToMany(Category::class, 'product_id', 'category_id');
    }
}
