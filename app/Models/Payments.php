<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    //protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = ['order_id', 'total_cost', 'bankcode', 'content', 'card_type', 'status'];
    public static function boot()
    {
        parent::boot();

        // Trước khi tạo một bản ghi mới, đảm bảo rằng createdAt và updatedAt được thiết lập đúng múi giờ
        self::creating(function ($model) {
            $model->created_at = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
            // $model->updated_at = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        });


    }
}