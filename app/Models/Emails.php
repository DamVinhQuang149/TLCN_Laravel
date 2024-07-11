<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Emails extends Model
{
    use HasFactory;
    protected $table = 'email_lists';
    protected $primaryKey = 'email_id';
    const UPDATED_AT = null;
    public $timestamps = true;
    protected $fillable = ['email'];
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