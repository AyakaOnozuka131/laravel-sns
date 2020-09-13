<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            // $table->カラムの属性('カラム名');とすることで、カラムを定義
            // 後ほどマイグレーションを実行すると、このマイグレーションファイルが使用され、以下のカラムを持ったarticlesテーブルが作成される
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('text');
            $table->bigInteger('user_id'); //整数
            $table->foreign('user_id')->references('id')->on('users'); //外部キー制約
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
        Schema::dropIfExists('articles');
    }
}
