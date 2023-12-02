<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = true;
    protected $fillable = ['user_id', 'address', 'phone', 'coupon_discount', 'total', 'note', 'checkout', 'status'];
}