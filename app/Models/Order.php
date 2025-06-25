<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/** @use HasFactory<\Database\Factories\OrderFactory> */

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'customer_id',
        'drink_id',
        'quantity',
        'total_price',
    ];

    /**
     * Get the customer that owns the order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the drink that belongs to the order.
     */
    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }
}