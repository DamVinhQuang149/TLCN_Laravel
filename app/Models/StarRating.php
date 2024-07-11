<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class StarRating extends Model
{
    use HasFactory;
    protected $table = 'star_rating';
    protected $fillable = ['user_id', 'product_id', 'star'];
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
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