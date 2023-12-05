<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    //protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = ['order_id', 'total_cost', 'bankcode', 'content', 'card_type', 'status'];
}