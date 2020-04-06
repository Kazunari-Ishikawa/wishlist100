@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header-component :is-login="@auth true @endauth @guest false @endguest"></header-component>

<div class="u-wrapper">
  <!-- メインコンテンツ -->
  <main id="main" class="l-main">

    <section class="l-container">
      <!-- 登録フォーム -->
      <formtab-component :is-login-form="false"></formtab-component>

      <div class="l-form">
        <form action="{{route('register')}}" method="POST" class="c-form">
          @csrf
          <label for="name" class="c-form__unit">
            <input type="text" name="name" id="name" class="c-form__input @error('name') is-invalid @enderror" placeholder="ユーザー名" value="{{ old('name')}}">
            @error('name')
            <span class="c-form__message c-form__message--invalid">{{$message}}</span>
            @enderror
          </label>
          <label for="email" class="c-form__unit">
            <input type="text" name="email" id="email" class="c-form__input @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
            @error('email')
            <span class="c-form__message c-form__message--invalid">{{$message}}</span>
            @enderror
          </label>
          <label for="password" class="c-form__unit">
            <input type="password" name="password" id="password" class="c-form__input @error('password') is-invalid @enderror" placeholder="パスワード" value="">
            @error('password')
            <span class="c-form__message c-form__message--invalid">{{$message}}</span>
            @enderror
          </label>
          <label for="password-confirm" class="c-form__unit">
            <input type="password" name="password_confirmation" id="password-confirm" class="c-form__input @error('password-confirm') is-invalid @enderror" placeholder="パスワード（再入力）" value="">
            @error('password-confirm')
            <span class="c-form__message c-form__message--invalid">{{$message}}</span>
            @enderror
          </label>
          <input type="submit" value="登録" class="c-form__submit c-btn">
          {{-- <div class="c-btn__container--form">
            <button class="c-btn c-btn--twitter c-btn--form"><i class="fab fa-twitter"></i> Twitterで登録</button>
          </div> --}}
        </form>
      </div>
    </section>
  </main>

  <footer-component></footer-component>
</div>

@endsection
