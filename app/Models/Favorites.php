<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Favorites extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id'];

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
    public static function boot()
    {
        parent::boot();

        // Trước khi tạo một bản ghi mới, đảm bảo rằng createdAt và updatedAt được thiết lập đúng múi giờ
        self::creating(function ($model) {
            $model->created_at = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
            $model->updated_at = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        });
        // Trước khi cập nhật một bản ghi, đảm bảo rằng updatedAt được cập nhật với múi giờ chính xác
        self::updating(function ($model) {
            $model->updated_at = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        });
    }
}
