<?php

namespace App\Http\Controllers;

use App\Article;

use App\Http\Requests\ArticleRequest;

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

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('articles.edit',['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save(); //モデルのfillメソッドの戻り値はそのモデル自身
        return redirect()->route('articles.index');
    }
    
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
