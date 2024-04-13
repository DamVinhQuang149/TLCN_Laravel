<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarRating extends Model
{
    use HasFactory;
    protected $table = 'star_rating';
    protected $fillable = ['user_id', 'product_id', 'star'];
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}