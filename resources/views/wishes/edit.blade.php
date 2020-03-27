@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header class="l-header">
  <h1 class="p-hero__title">わたしの100のリスト</h1>
  <nav class="c-nav">
    <ul class="c-nav__list">
      <li class="c-nav__item"><a href="mypage.html" class="c-nav__link">マイページ</a></li>
      <li class="c-nav__item"><a href="register.html" class="c-nav__link">アカウント設定</a></li>
      <li class="c-nav__item"><a href="login.html" class="c-nav__link">リスト設定</a></li>
      <li class="c-nav__item"><a href="index.html" class="c-nav__link">ログアウト</a></li>
    </ul>
  </nav>
</header>

<!-- メインコンテンツ -->
<main id="main" class="l-main">
  <!-- インフォメーション -->
  <section id="Info" class="l-info u-main">
    <div class="p-info__container">
      <h2 class="p-info__title">りえこさんの<br class="p-info__title--br">100のリスト</h2>
      <!-- 達成度グラフ -->
      <div class="p-info__summary">
        <p class="p-info__text">Wish List：3</p><span class="p-info__text--br"> / </span>
        <Done class="p-info__text">Done List：2</p>
      </div>
  </section>

  <!-- リスト -->
  <section id="WishList" class="l-container u-main">
    <div class="p-wishList">
      <div class="p-wishList__header">
        <div class="p-wishList__listBtn">
          <div class="c-outlineBtn__container c-outlineBtn__container--left">
            <div class="c-outlineBtn">Wish List</div>
            <div class="c-outlineBtn">Done List</div>
          </div>
        </div>
        <div class="p-wishList__createBtn">
          <div class="c-outlineBtn__container c-outlineBtn__container--right">
            <div class="c-outlineBtn">新しく追加する</div>
          </div>
        </div>
      </div>
      <div class="p-wishList__item">
        <i class="fas fa-plane p-wishList__icon u-icon"></i>
        <p class="p-wishList__text">屋久島へ行く</p>
        <i class="far fa-thumbs-up p-wishList__icon"></i>
      </div>
      <div class="p-wishList__item">
        <i class="fas fa-bicycle p-wishList__icon u-icon"></i>
        <p class="p-wishList__text">しまなみ海道でサイクリング</p>
        <i class="far fa-thumbs-up p-wishList__icon"></i>
      </div>
      <div class="p-wishList__item">
        <i class="fas fa-plane p-wishList__icon u-icon"></i>
        <p class="p-wishList__text">奥入瀬渓流へ行く</p>
        <i class="far fa-thumbs-up p-wishList__icon"></i>
      </div>

    </div>
  </section>
</main>

<!-- 新規登録モーダル -->
<div class="l-modal__cover">
  <div class="c-modal__container">
    <div class="c-modal__header">やりたいことを追加する</div>
    <form action="" class="c-form--modal">
      <label for="" class="c-form__unit">
        <select name="" id="" class="c-form__select">
          <option value="0">カテゴリ無し</option>
          <option value="1">ライフスタイル</option>
          <option value="2">ホビー</option>
          <option value="3">スキルアップ</option>
          <option value="4">トラベル</option>
          <option value="5">グルメ</option>
        </select>
      </label>
      <label for="" class="c-form__unit">
        <input type="text" class="c-form__input" placeholder="わたしのやりたいこと">
      </label>
      <input type="submit" value="追加する" class="c-form__submit">
    </form>
  </div>
</div>

<!-- フッター -->
<footer id="footer" class="l-footer">
  <div class="l-footer__copyright">
    <small>&copy; 2020 わたしの100のリスト All Rights Reserved.</small>
  </div>
</footer>

@endsection
