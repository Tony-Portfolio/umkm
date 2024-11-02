<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'umkm_id',
        'name',
        'description',
        'price',
        'stock',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
}
