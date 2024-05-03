<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['id' , 'user_id' ,  'action' , 'description', 'on_table','properties' , 'url'];
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

}
