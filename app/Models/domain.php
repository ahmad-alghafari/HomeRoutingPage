<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domain extends Model
{
    use HasFactory;
    protected  $fillable = [
        'id',
        'name',
        'description',
        'country',
        'type',
        'url',
        'domain',
        'social',
        'constraind',
        'photo_path',
        'created_at',
        'updated_at',
        'language',    
        'user_id',    
    ];
}
