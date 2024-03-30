<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $primaryKey = 'comm_id';
    protected $fillable = ['user_id', 'product_id', 'comment'];
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
