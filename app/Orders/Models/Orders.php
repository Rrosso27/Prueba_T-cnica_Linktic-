<?php

namespace App\Orders\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'total_amount',
        'payment_status',
        'payment_method',
        'shipping_address',
        'billing_address',
        'shipping_fee',
        'discount',
        'notes'
    ];

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
