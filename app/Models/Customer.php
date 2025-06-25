<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/** @use HasFactory<\Database\Factories\CustomerFactory> */

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
    ];

    /**
     * Get the orders for the customer.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}