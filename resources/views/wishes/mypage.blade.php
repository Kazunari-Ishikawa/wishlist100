@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header class="l-header">
  <h1 class="p-hero__title">わたしの100のリスト</h1>

  <!-- ハンバーガーメニュー -->
  <div class="c-triggerMenu">
    <span class="c-triggerMenu__bar"></span>
    <span class="c-triggerMenu__bar"></span>
    <span class="c-triggerMenu__bar"></span>
  </div>

  <nav class="c-spNav__cover">
    <div class="c-spNav__iconContainer">
      <i class="fas fa-times c-spNav__icon"></i>
      <p class="c-spNav__iconText">CLOSE</p>
    </div>
    <!-- ナビゲーション -->
    <ul class="c-nav c-spNav">
      <li class="c-nav__item c-spNav__item"><a href="{{ route('wishes.mypage') }}" class="c-nav__link">マイページ</a></li>
      <li class="c-nav__item c-spNav__item"><a href="account.html" class="c-nav__link">アカウント設定</a></li>
      <li class="c-nav__item c-spNav__item"><a href="listsetting.html" class="c-nav__link">リスト設定</a></li>
      <li class="c-nav__item c-spNav__item">
        <a href="{{ route('logout') }}" class="c-nav__link" onclick="event.preventDefault(); document.getElementById('js-logout-form').submit();">ログアウト</a>
        <form action="{{route('logout')}}" id="js-logout-form" method="POST" style="display: none;">@csrf</form>
      </li>
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
            <div class="c-outlineBtn"><a href="create.html">新しく追加する</a></div>
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
<footer id="footer" class="l-footer">
  <div class="l-footer__copyright">
    <small>&copy; 2020 わたしの100のリスト All Rights Reserved.</small>
  </div>
</footer>

@endsection
