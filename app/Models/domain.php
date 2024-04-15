<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class domain extends Model
{
    use HasFactory;
    protected $fillable = ['id' ,  'name' , 'language' , 'description' , 'Type' , 'country' , 'domain' ,'URL' ,'user_id','photo_path'];

    public function user():BelongsTo{
        return $this->belongsTo(user::class , 'user_id');
    }
}
