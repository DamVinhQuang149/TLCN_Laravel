<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Advertisements  extends Model
{
    use HasFactory;
    protected $table = 'advertisements';
    const UPDATED_AT = null;
    protected $fillable = ['title', 'content', 'offer', 'contact_info'];
    public static function boot()
    {
        parent::boot();

        // Trước khi tạo một bản ghi mới, đảm bảo rằng createdAt và updatedAt được thiết lập đúng múi giờ
        self::creating(function ($model) {
            $model->created_at = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
            // $model->updatedAt = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        });
    }
}