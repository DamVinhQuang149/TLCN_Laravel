<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'orderdetail_id';
    public $timestamps = false;
    protected $fillable = ['order_id', 'product_name', 'discount_price', 'product_quantity', 'cost', 'product_id', 'type_id', 'product_image'];
}