<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Orders extends Model
{

    use HasFactory;

    const UPDATED_AT = null;

    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    public $timestamps = true;

    protected $fillable = ['user_id', 'order_code', 'address', 'shipping_fee', 'phone', 'coupon_discount', 'total', 'note', 'checkout', 'status'];

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