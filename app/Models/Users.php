<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = ['First_name', 'Last_name', 'email', 'phone', 'username', 'password', 'role_id', 'image'];
    //a product belongs to a role
    public function role() {
        return $this->belongsTo(Roles::class, 'role_id');
    }
}