<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Products extends Model
{
    use HasFactory;
    use Searchable;
    protected $guarded = ['id'];
    protected $fillable = ['name_product', 'desc_product', 'price', 'category_id', 'total_rating'];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(CategoryProducts::class, 'category_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(ImageProducts::class, 'product_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function toSearchableArray()
    {
        return [
            'name_product' => '',
            'category_products.category_name' => '',
            'price' => '',
        ];
    }
}
