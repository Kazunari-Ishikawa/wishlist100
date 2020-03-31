<template>
  <div id="MainContents">
    <!-- インフォメーション -->
    <section id="Info" class="l-info u-main">
      <div class="p-info__container">
        <h2 class="p-info__title">
          {{ }}さんの
          <br class="p-info__title--br" />100のリスト
        </h2>
        <!-- 達成度グラフ -->
        <div class="p-info__summary">
          <p class="p-info__text">Wish List：{{ }}</p>
          <span class="p-info__text--br">/</span>
          <p class="p-info__text">Done List：{{ }}</p>
        </div>
      </div>
    </section>

    <!-- リスト -->
    <WishList :items="items" />
  </div>
</template>

<script>
import WishList from "./WishList";
export default {
  props: { items: Array },
  components: {
    WishList
  }
};
</script>