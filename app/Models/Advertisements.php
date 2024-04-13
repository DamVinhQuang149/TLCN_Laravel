<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisements  extends Model
{
    use HasFactory;
    protected $table = 'advertisements';
    const UPDATED_AT = null;
    protected $fillable = ['title', 'content', 'offer', 'contact_info'];
}