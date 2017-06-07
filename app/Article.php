<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    // user와 관계 설정
    public function user() {
      return $this->belongsTo(User::class);
    }
}
