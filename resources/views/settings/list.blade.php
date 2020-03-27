@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header class="l-header">
  <h1 class="p-hero__title">わたしの100のリスト</h1>
  <nav class="c-nav">
    <ul class="c-nav__list">
      <li class="c-nav__item"><a href="mypage.html" class="c-nav__link">マイページ</a></li>
      <li class="c-nav__item"><a href="account.html" class="c-nav__link">アカウント設定</a></li>
      <li class="c-nav__item"><a href="listsetting.html" class="c-nav__link">リスト設定</a></li>
      <li class="c-nav__item"><a href="index.html" class="c-nav__link">ログアウト</a></li>
    </ul>
  </nav>
</header>

<!-- メインコンテンツ -->
<main id="main" class="l-main">
  <!-- タイトル -->
  <section id="Info" class="l-info u-main">
    <div class="p-info__container">
      <h2 class="p-info__title--setting">リスト設定</h2>
    </div>
  </section>

  <section class="l-container u-main">
    <!-- 設定画面 -->
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
      <input type="submit" value="変更" class="c-form__submit">
    </form>
  </section>
</main>

<footer id="footer" class="l-footer">
  <div class="l-footer__copyright">
    <small>&copy; 2020 わたしの100のリスト All Rights Reserved.</small>
  </div>
</footer>

@endsection
