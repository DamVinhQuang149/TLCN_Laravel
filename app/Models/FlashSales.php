<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


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
        'initial_price'
    ];

    public static function boot()
    {
        parent::boot();

        // Trước khi tạo một bản ghi mới, đảm bảo rằng createdAt và updatedAt được thiết lập đúng múi giờ
        self::creating(function ($model) {
            $model->start_date = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
            // $model->updatedAt = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        });
    }
}