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
    <div class="p-wishList">
      <div class="p-wishList__header">
        <div class="p-wishList__listBtn">
          <div class="c-outlineBtn__container c-outlineBtn__container--left">
            <a href="/mypage" class="c-outlineBtn">Wish List</a>
            <a href="/mypage/done" class="c-outlineBtn">Done List</a>
          </div>
        </div>
        <div class="p-wishList__createBtn">
          <div class="c-outlineBtn__container c-outlineBtn__container--right">
            <a href="/mypage/new" class="c-outlineBtn c-outlineBtn--right">新しく<br class="c-outlineBtn__br">追加する</a>
          </div>
        </div>
      </div>
      <div class="p-wishList__item">
        <i class="fas fa-plane p-wishList__icon u-icon"></i>
        <div class="p-wishList__contents">
          <p class="p-wishList__text">屋久島へ行く</p>
          <p class="p-wishList__date">2019/10/12登録</p>
        </div>
        <i class="far fa-thumbs-up p-wishList__icon u-icon u-icon--done"></i>
      </div>
      <div class="p-wishList__item">
        <i class="fas fa-bicycle p-wishList__icon u-icon"></i>
        <div class="p-wishList__contents">
          <p class="p-wishList__text">しまなみ海道でサイクリング</p>
          <p class="p-wishList__date">2019/10/12登録</p>
        </div>
        <i class="far fa-thumbs-up p-wishList__icon u-icon u-icon--done"></i>
      </div>
      <div class="p-wishList__item">
        <i class="fas fa-plane p-wishList__icon u-icon"></i>
        <div class="p-wishList__contents">
          <p class="p-wishList__text">奥入瀬渓流へ行く</p>
          <p class="p-wishList__date">2019/10/1登録</p>
        </div>
        <i class="far fa-thumbs-up p-wishList__icon u-icon u-icon--done"></i>
      </div>

    </div>
  </section>
</main>

<!-- フッター -->
<footer-component></footer-component>

@endsection
