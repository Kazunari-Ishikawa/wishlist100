@extends('layouts.app')

@section('content')
<div class="p-topImg">

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
        <li class="c-nav__item c-spNav__item"><a href="index.html" class="c-nav__link">TOP</a></li>
        <li class="c-nav__item c-spNav__item"><a href="{{route('register')}}" class="c-nav__link">新規登録</a></li>
        <li class="c-nav__item c-spNav__item"><a href="{{route('login')}}" class="c-nav__link">ログイン</a></li>
      </ul>
    </nav>
  </header>

  <!-- メインコンテンツ -->
  <main id="main" class="l-main">
    <!-- ヒーローイメージ -->
    <div class="p-hero__container">
      <h2 class="p-hero__copy">どこへ行こうとも、<br>全ては自分の選択次第。</h2>
      <p class="p-hero__text">人生で本当に大切なことを書き留めよう。</p>
      <p class="p-hero__text">目指すものを明確にして心に火をつけよう。</p>
    </div>
    <!-- 登録エリア -->
    <section id="Register" class="l-container">
      <div class="c-btn__container">
        <button class="c-btn c-btn--register">新規登録</button>
      </div>
      <div class="c-btn__container">
        <button class="c-btn c-btn--login">ログイン</button>
      </div>
      <div class="c-btn__container">
        <button class="c-btn c-btn--twitter"><i class="fab fa-twitter"></i> Twitterで登録/ログイン</button>
      </div>
    </section>
  </main>

  <!-- フッター -->
  <footer id="footer" class="l-footer">
    <div class="l-footer__copyright">
      <small>&copy; 2020 わたしの100のリスト All Rights Reserved.</small>
    </div>
  </footer>

</div>

@endsection
