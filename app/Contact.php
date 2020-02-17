<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_name',
        'email',
        'title',
        // 'audio',audiosテーブルを作成したのでそちらにリレーション
        'score',
        'body',
    ];
    // Audioモデルとリレーション
    public function audios(){
        return $this->hasMany(Audio::class);
    }
}