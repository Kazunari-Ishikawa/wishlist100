@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header-component :is-login="@auth true @endauth @guest false @endguest" :user="{{$user}}"></header-component>

<div class="u-wrapper">
  <!-- メインコンテンツ -->
  <main id="main" class="l-main">
    <!-- タイトル -->
    <section id="Info" class="l-info u-main">
      <div class="p-info__container">
        <h2 class="p-info__title--setting">アカウント情報の変更</h2>
      </div>
    </section>

    <section class="l-container u-main">

      <!-- 設定画面 -->
      <form action="{{ route('account.update', $user->id) }}" method="POST" class="c-form">
        @csrf
        <label for="name" class="c-form__unit">
          <input type="text" name="name" id="name" class="c-form__input @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="ユーザー名">
          @error('name')
          <span class="c-form__message c-form__message--invalid">{{ $message }}</span>
          @enderror
        </label>
        <label for="email" class="c-form__unit">
          <input type="text" name="email" id="email" class="c-form__input @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="Email">
          @error('email')
          <span class="c-form__message c-form__message--invalid">{{ $message }}</span>
          @enderror
        </label>
        <input type="submit" value="変更" class="c-form__submit">
      </form>

      {{-- パスワードの変更 --}}
      <form action="{{ route('account.password', $user->id) }}" method="POST" class="c-form">
        @csrf
        <label for="current_password" class="c-form__unit">
          <input type="password" name="current_password" id="current_password" class="c-form__input @error('current_password') is-invalid @enderror" placeholder="現在のパスワード">
          @error('current_password')
          <span class="c-form__message c-form__message--invalid">{{ $message }}</span>
          @enderror
        </label>
        <label for="password" class="c-form__unit">
          <input type="password" name="password" id="password" class="c-form__input @error('password') is-invalid @enderror" placeholder="新しいパスワード">
          @error('password')
          <span class="c-form__message c-form__message--invalid">{{ $message }}</span>
          @enderror
        </label>
        <label for="password_confirmation" class="c-form__unit">
          <input type="password" name="password_confirmation" id="password-confirm" class="c-form__input @error('password_confirmation') is-invalid @enderror" placeholder="新しいパスワード（再入力）">
          @error('password_confirmation')
          <span class="c-form__message c-form__message--invalid">{{ $message }}</span>
          @enderror
        </label>
        <input type="submit" value="パスワードの変更" class="c-form__submit">
      </form>

      {{-- 退会ボタン --}}
      <form action="{{ route('account.withdraw', $user->id) }}" method="POST" class="">
        @csrf
        <input type="submit" value="退会する" class="c-form__withdraw" onclick="return confirm('データが全て削除されます。本当に退会しますか？')">
      </form>
    </section>
  </main>

  <!-- フッター -->
  <footer-component></footer-component>

</div>
@endsection
