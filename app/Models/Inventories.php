<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Inventories extends Model
{

    use HasFactory;

    protected $table = 'inventories';

    protected $primaryKey = 'inventory_id';

    public $timestamps = false;

    protected $fillable = [
        'product_name',
        'product_image',
        'product_id',
        'import_quantity',
        'sold_quantity',
        'remain_quantity',
        'inventory_status'
    ];

}