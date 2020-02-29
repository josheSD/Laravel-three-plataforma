<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class User extends Model
{

    protected static function boot(){
        parent::boot();
        static::creating(function(User $user){
           if( !\App::runningInConsole()){
               $user->slug = Str::slug($user->name . " " . $user->last_name, "-");
           }
        });
    }


    protected $fillable = [
        'name','email','password'
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function student(){
        return $this->hasOne(Student::class);
    }

    public function teacher(){
        return $this->hasOne(Teacher::class);
    }

    public function socialAccount(){
        return $this->hasOne(UserSocialAccount::class);
    }

}
