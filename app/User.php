<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail{

    use Notifiable;

    protected $fillable = ['slug','name', 'email', 'password','file_path'];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    protected static function boot(){

        parent::boot();

        static::creating(function($user){
            $user->slug = Str::slug($user->name);

            $latestSlug = static::whereRaw("slug RLIKE '^{$user->slug}(-[0-9]*)?$'")->latest('id')->value('slug');

            if($latestSlug){
                $pieces = explode('-',$latestSlug);
                $number = intval(end($pieces));
                $user->slug.='-'.($number+1);
            }
        });
    }

    public function getRouteKeyName(){

        return 'slug';
    }

    public function avatar(){

        if(!$this->file_path){
            return 'avatars/default.jpg';
        }

        return $this->file_path;
    }

    public function articles() {

        return $this->hasMany('App\Article');
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    }
}
