<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User'); //Articleクラスのインスタンス自身
    }

    public function likes(): BelongsToMany
    {
        //belongsToManyメソッドの第一引数には関係するモデルのモデル名を渡し、第二引数には中間テーブルのテーブル名を渡す。
        //created_at、updated_atカラムが存在する場合、withTimestampsメソッドを付ける
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool //?をつけると、引数がnullであることも許容される。boolはtrueかfalseに変換
    {
        return $user
         ? (bool)$this->likes->where('id', $user->id)->count()
         : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
    
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
