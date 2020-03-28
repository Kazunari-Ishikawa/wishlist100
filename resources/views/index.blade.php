@extends('layouts.app')

@section('content')
<div class="p-topImg">
  <!-- ヘッダー -->
  <header-component :is-login="@auth true @endauth @guest false @endguest"></header-component>

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
  <footer-component></footer-component>

</div>

@endsection
