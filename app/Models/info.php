<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class info extends Model
{
    use HasFactory;
    protected $fillable = [
        'id' ,
        'posts_number' ,
        'community_status' ,
        'user_id' ,
        'overview' ,
        'address' ,
        'birth' ,
        'job' ,
        'phone' ,
        'follower' ,
        'following'  ,
        ];
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
