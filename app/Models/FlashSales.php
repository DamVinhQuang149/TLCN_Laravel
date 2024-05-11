<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSales extends Model
{
    use HasFactory;
    protected $table = 'flash_sales';

    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $dates = ['end_date'];

    protected $fillable = [
        'product_id',
        'end_date',
    ];
}