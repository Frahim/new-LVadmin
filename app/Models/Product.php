<?php

namespace App\Models;

use App\Models\Brands;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'short_description', 
        'package_info', 
        'intermediate_esistance',
        'variety',
        'orginal_price',
        'selling_price',
        'quantity',       
        'meta_title',
        'meta_keyword',
        'meta_description',        
    ];

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
