<?php



namespace App\Models;




use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



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

}

