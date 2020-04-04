@extends('layouts.app')

@section('content')
<div class="p-topImg">
  <!-- ヘッダー -->
  <header-component :is-login="false"></header-component>

  <div class="u-wrapper">
    <!-- メインコンテンツ -->
    <main id="main" class="l-main">
      <!-- ヒーローイメージ -->
      <div class="p-hero__container">
        <h2 class="p-hero__copy">どこへ行こうとも<br>全ては自分の選択次第</h2>
        <p class="p-hero__text">人生で本当に大切なことを<br>書き留めよう。</p>
        <p class="p-hero__text">目指すものを明確にして<br>心に火をつけよう。</p>
      </div>
      <!-- 登録エリア -->
      <section id="Register" class="l-container">
        <div class="c-btn__container">
          <a href="/register"><button class="c-btn c-btn">新規登録</button></a>
        </div>
        <div class="c-btn__container">
          <a href="/login"><button class="c-btn">ログイン</button></a>
        </div>
        <div class="c-btn__container">
          <a href="/use"><button class="c-btn c-btn--use">使い方</button></a>
        </div>
        {{-- <div class="c-btn__container">
        <button class="c-btn c-btn--twitter"><i class="fab fa-twitter"></i> Twitterで登録/ログイン</button>
      </div> --}}
      </section>
    </main>

    <!-- フッター -->
    <footer-component></footer-component>

  </div>
</div>

@endsection
