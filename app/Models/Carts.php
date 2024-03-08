<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['products_id', 'users_id', 'quantity'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function products()
    {
        return $this->hasOne(Products::class, 'id', 'products_id');
    }
}
