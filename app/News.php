<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';
    protected $guarded = ['views'];//不可更改的欄位(黑名單)
    // protected $fillable = ['title', 'date', 'img', 'content', 'created_at']; //可存取更改的欄位(白名單) 
    //黑名單&白名單則一 ，白名單權力較大
}
