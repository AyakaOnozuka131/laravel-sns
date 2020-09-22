<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            //likesテーブルのuser_idカラムは、usersテーブルのidカラムを参照すること
            //onDelete('cascade')
            //いいねをしたユーザーがusersテーブルから削除された場合には、likesテーブルから、そのユーザーに紐づくレコードが削除される
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}