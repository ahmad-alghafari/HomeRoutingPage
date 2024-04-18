<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'servicing' ,
        'page_name' ,
        'route_name',
        'created_at',
        'updated_at',
    ];
}
