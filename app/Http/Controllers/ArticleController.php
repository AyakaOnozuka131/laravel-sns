<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index(){
        $articles = Article::all()->sortByDesc('created_at');

        return view( 'articles.index' , ['articles' => $articles ]);
        // viewメソッドの第一引数には、ビューファイル名を渡す・
        // 'articles.index'とすることで、resources/views/articlesディレクトリにある、indexという名前のビューファイルが表示
        // 
    }
}
