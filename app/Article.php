<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Relations\BelongsTo;

class Article extends Model
{
    public function user():Belongsto{

        return $this->belongsTo('App\User'); //Articleクラスのインスタンス自身
    }
}
