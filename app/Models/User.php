<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class User extends Authenticatable implements MustVerifyEmail,CanResetPassword{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['id', 'name', 'email', 'name', 'email', 'role', 'status', 'password', 'last_login_at'];
    protected $hidden = ['password', 'remember_token',];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed', 'last_login_at' => 'datetime'];
    public function post():HasMany {return $this->hasMany(post::class , 'user_id','id');}
    public function comment():HasMany {return $this->hasMany(comment::class , 'user_id','id');}
    public function like():HasMany {return $this->hasMany(like::class , 'user_id','id');}
    public function follow():HasMany {return $this->hasMany(follow::class , 'user_follow','id');}
    public function followMe() : HasMany{return $this->hasMany(follow::class , 'user_follower','id');}
    public function block():HasMany {return $this->hasMany(block::class , 'user_blocker','id');}
    public function blockMe() :HasMany {return $this->hasMany(block::class , 'user_blocked' , 'id');}
    public function photo() : HasOne {return $this->hasOne(pphoto::class , 'user_id' , 'id');}
    public function info() :HasOne {return $this->hasOne(info::class , 'user_id' , 'id');}
    public function commentlike() : HasMany {return $this->hasMany(commentlike::class , 'user_id' , 'id');}
    public function share() : HasMany {return $this->hasMany(share::class , 'user_id' , 'id');}

    public function file() : HasMany {return $this->hasMany(file::class , 'user_id' , 'id');}

}
