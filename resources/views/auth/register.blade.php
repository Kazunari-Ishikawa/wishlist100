@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header class="l-header">
  <h1 class="p-hero__title">わたしの100のリスト</h1>
  <nav class="c-nav">
    <ul class="c-nav__list">
      <li class="c-nav__item"><a href="index.html" class="c-nav__link">TOP</a></li>
      <li class="c-nav__item"><a href="register.html" class="c-nav__link">新規登録</a></li>
      <li class="c-nav__item"><a href="login.html" class="c-nav__link">ログイン</a></li>
    </ul>
  </nav>
</header>

<!-- メインコンテンツ -->
<main id="main" class="l-main">
  <!-- タイトル -->

  <section class="l-container">
    <!-- 登録フォーム -->
    <div class="p-formTab">
      <div class="p-formTab__item">新規登録</div>
      <div class="p-formTab__item">ログイン</div>
    </div>
    <div class="l-form">
      <form action="" class="c-form">
        <label for="name" class="c-form__unit">
          <input type="text" name="name" id="name" class="c-form__input" placeholder="ユーザー名">
        </label>
        <label for="email" class="c-form__unit">
          <input type="text" name="email" id="email" class="c-form__input" placeholder="Email">
        </label>
        <label for="password" class="c-form__unit">
          <input type="password" name="password" id="password" class="c-form__input" placeholder="パスワード">
        </label>
        <label for="password_re" class="c-form__unit">
          <input type="password" name="password_re" id="password_re" class="c-form__input" placeholder="パスワード（再入力）">
        </label>
        <input type="submit" value="登録" class="c-form__submit c-btn">
        <div class="c-btn__container--form">
          <button class="c-btn c-btn--twitter c-btn--form"><i class="fab fa-twitter"></i> Twitterで登録</button>
        </div>
      </form>
    </div>
  </section>
</main>

<footer id="footer" class="l-footer">
  <div class="l-footer__copyright">
    <small>&copy; 2020 わたしの100のリスト All Rights Reserved.</small>
  </div>
</footer>

@endsection
