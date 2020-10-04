@extends('app')<!-- app.blade.phpをベースとして使うことを宣言 -->

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="container">
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection
