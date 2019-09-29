<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{

    protected $table = 'comments';
    protected $fillable = ['body','article_id','article_slug'];

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
