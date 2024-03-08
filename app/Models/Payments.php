<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['users_id', 'products_id', 'quantity', 'subtotal', 'payment_id', 'total_payment', 'status_payment', 'code_vouchers_id'];

    public function products()
    {
        return $this->belongsTo(Products::class, 'products_id', 'id');
    }
}
