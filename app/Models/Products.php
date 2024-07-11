<?php



namespace App\Models;




use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Products extends Model
{

    use HasFactory;

    public $appends = ['favorited'];

    protected $table = 'products';

    protected $primaryKey = 'id';

    public $timestamps = false;



    protected $fillable = ['name', 'manu_id', 'type_id', 'description', 'price', 'discount_price', 'feature', 'pro_image'];

    public function getFavoritedAttribute()
    {
        $favorited = Favorites::where(['product_id' => $this->id, 'user_id' => auth()->id()])->first();
        return $favorited ? true : false;
    }

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

