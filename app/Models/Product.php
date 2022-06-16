<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'image',
        'price',
        'created_at',
        'updated_at'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }

    public function cart(){
        return $this->belongsTo(Product::class);
    }
}
