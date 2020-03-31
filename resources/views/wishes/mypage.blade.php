@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header-component :is-login="@auth true @endauth @guest false @endguest"></header-component>

<!-- メインコンテンツ -->
<main id="main" class="l-main">
  <main-component :items="{{$items}}"></main-component>
</main>

<!-- フッター -->
<footer-component></footer-component>

@endsection
