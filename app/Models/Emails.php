<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    use HasFactory;
    protected $table = 'email_lists';
    protected $primaryKey = 'email_id';
    const UPDATED_AT = null;
    public $timestamps = true;
    protected $fillable = ['email'];
}