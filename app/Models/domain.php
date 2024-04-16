<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class domain extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = ['id' ,  'name' , 'language' , 'description' , 'Type' , 'country' , 'domain' ,'URL' ,'user_id','photo_path'];

    public function user():BelongsTo{
        return $this->belongsTo(user::class , 'user_id');
    }
=======
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
>>>>>>> b88805c4db649d63f7cd80dfed16a617fa537266
}
