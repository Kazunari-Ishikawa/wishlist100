@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header class="l-header">
  <h1 class="p-hero__title">わたしの100のリスト</h1>
  <nav class="c-nav">
    <ul class="c-nav__list">
      <li class="c-nav__item"><a href="{{route('index')}}" class="c-nav__link">TOP</a></li>
      <li class="c-nav__item"><a href="{{route('register')}}" class="c-nav__link">新規登録</a></li>
      <li class="c-nav__item"><a href="{{route('login')}}" class="c-nav__link">ログイン</a></li>
    </ul>
  </nav>
</header>

<!-- メインコンテンツ -->
<main id="main" class="l-main">
  <section class="l-container">
    <!-- 登録フォーム -->
    <div class="p-formTab">
      <div class="p-formTab__item">新規登録</div>
      <div class="p-formTab__item">ログイン</div>
    </div>
    <div class="l-form">
      <form action="{{route('login')}}" method="POST" class="c-form">
        @csrf
        <label for="email" class="c-form__unit">
          <input type="text" name="email" id="email" class="c-form__input @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
          @error('email')
          <span class="c-form__message c-form__message--invalid">{{$message}}</span>
          @enderror
        </label>
        <label for="password" class="c-form__unit">
          <input type="password" name="password" id="password" class="c-form__input @error('password') is-invalid @enderror" placeholder="パスワード" value="{{ old('password') }}">
          @error('password')
          <span class="c-form__message c-form__message--invalid">{{$message}}</span>
          @enderror
        </label>
        <p class="c-form__text"><a href="#">パスワードを忘れた？</a></p>
        <p class="c-form__text"><a href="{{ route('register') }}">まだ登録していない？</a></p>
        <input type="submit" value="ログイン" class="c-form__submit c-btn">
        <div class="c-btn__container--form">
          <button class="c-btn c-btn--twitter c-btn--form"><i class="fab fa-twitter"></i> Twitterでログイン</button>
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
