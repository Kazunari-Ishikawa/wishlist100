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
    <div class="c-modal__header">
      <i class="fas fa-times-circle u-icon--cancel"></i>
    </div>
    <p class="c-modal__text">やりたいことを<br class="c-modal__br">書こう！</p>
    <form action="" class="c-form--modal c-modal">
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
      <input type="submit" value="追加する" class="c-form__submit c-form__unit">
    </form>
  </div>
</div>

<!-- フッター -->
<footer-component></footer-component>

@endsection
