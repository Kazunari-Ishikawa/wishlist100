@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header-component :is-login="@auth true @endauth @guest false @endguest"></header-component>

<!-- メインコンテンツ -->
<main id="main" class="l-main">
  <!-- インフォメーション -->
  <section id="Info" class="l-info u-main">
    <div class="p-info__container">
      <h2 class="p-info__title">{{ $user->name }}さんの<br class="p-info__title--br">100のリスト</h2>
      <!-- 達成度グラフ -->
      <div class="p-info__summary">
        <p class="p-info__text">Wish List：3</p><span class="p-info__text--br"> / </span>
        <p class="p-info__text">Done List：2</p>
      </div>
  </section>

  <!-- リスト -->
  <section id="WishList" class="l-container u-main">
    <wish-list></wish-list>
  </section>

</main>

<!-- フッター -->
<footer-component></footer-component>

@endsection
