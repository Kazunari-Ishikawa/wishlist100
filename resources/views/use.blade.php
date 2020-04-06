@extends('layouts.app')

@section('content')
<div class="p-topImg">
  <!-- ヘッダー -->
  <header-component :is-login="false"></header-component>

  <div class="u-wrapper">
    <!-- メインコンテンツ -->
    <main id="main" class="l-main">
      <!-- 説明 -->
      <section id="HowTo" class="l-container">

        <div class="p-howTo__container">
          <h1 class="p-howTo__title">これは単なるTODOリストではありません。</h1>

          <div class="p-howTo__list">
            <p class="p-howTo__item">リストには100個のみ登録できます。</p>
            <p class="p-howTo__item">今のあなたには多く感じるかもしれませんが、</p>
            <p class="p-howTo__item">無闇に登録するとすぐ埋まってしまいます。</p>
            <p class="p-howTo__item">日常の些末なことではなく「本当にやりたいこと」ならば、</p>
            <p class="p-howTo__item">100個というのは丁度良く感じられるでしょう。</p>
          </div>
        </div>
      </section>
    </main>

    <!-- フッター -->
    <footer-component></footer-component>

  </div>
</div>

@endsection
