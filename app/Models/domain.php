<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class domain extends Model
{
    use HasFactory;
    public function user():BelongsTo{
        return $this->belongsTo(user::class , 'user_id');
    }
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
        'online'
    ];
}
