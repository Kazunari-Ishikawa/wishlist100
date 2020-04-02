<template>
  <div id="MainContents">
    <!-- インフォメーション -->
    <section id="Info" class="l-info u-main">
      <div class="p-info__container">
        <!-- 項目数 -->
        <div class="p-info__summary">
          <p class="p-info__text">Wish List：{{ wishNum }}</p>
          <span class="p-info__text--br">/</span>
          <p class="p-info__text">Done List：{{ doneNum }}</p>
        </div>
      </div>
    </section>

    <!-- リスト -->
    <WishList :items="items" @send-wish-items="countWish" @send-done-items="countDone" />
  </div>
</template>

<script>
import WishList from "./WishList";
export default {
  props: { items: Array, user: Object },
  components: {
    WishList
  },
  data() {
    return {
      wishNum: null,
      doneNum: null
    };
  },
  methods: {
    countWish(wishItems) {
      this.wishNum = wishItems.length;
    },

    countDone(doneItems) {
      this.doneNum = doneItems.length;
    }
  }
};
</script>