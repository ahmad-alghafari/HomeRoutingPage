<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class commentlike extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'comment_id'] ;
    public function comment():BelongsTo{
        return $this->belongsTo(comment::class , 'comment_id');
    }

    public function user():BelongsTo{
        return $this->belongsTo(user::class , 'user_id');
    }

}
