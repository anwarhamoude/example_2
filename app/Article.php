<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model{

    protected $table = 'articles';
    protected $fillable = ['slug','title','content','file_path'];

    protected static function boot(){

        parent::boot();

        static::creating(function($article){
            $article->slug = Str::slug($article->title);

            $latestSlug = static::whereRaw("slug RLIKE '^{$article->slug}(-[0-9]*)?$'")->latest('id')->value('slug');

            if($latestSlug){
                $pieces = explode('-',$latestSlug);
                $number = intval(end($pieces));
                $article->slug.='-'.($number+1);
            }
        });
    }

    public function getRouteKeyName(){

        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
