@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header-component :is-login="@auth true @endauth @guest false @endguest" :user="{{$user}}"></header-component>

<!-- メインコンテンツ -->
<main id="main" class="l-main">
  <h1>準備中です！</h1>
  <h2>もう少し待っててね！</h2>
</main>

<!-- フッター -->
<footer-component></footer-component>

@endsection
