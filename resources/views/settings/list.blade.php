@extends('layouts.app')

@section('content')
<!-- ヘッダー -->
<header-component :is-login="@auth true @endauth @guest false @endguest" :user="{{$user}}"></header-component>

<!-- メインコンテンツ -->
<main id="main" class="l-main">
  <!-- タイトル -->
  <section id="Info" class="l-info u-main">
    <div class="p-info__container">
      <h2 class="p-info__title--setting">リスト設定</h2>
    </div>
  </section>

  <section class="l-container u-main">
    <h1>準備中です！</h1>
  </section>
</main>

<!-- フッター -->
<footer-component></footer-component>

@endsection
