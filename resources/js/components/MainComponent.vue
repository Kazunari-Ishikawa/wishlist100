<template>
  <div id="MainContents">
    <!-- インフォメーション -->
    <section id="Info" class="l-info u-main">
      <div class="p-info__container">
        <!-- 表示リスト切り替え -->
        <div class="c-outlineBtn__container">
          <div class="c-outlineBtn" @click="openWishList" :class="{isShow: isWishList}">Wish List</div>
          <div class="c-outlineBtn" @click="openDoneList" :class="{isShow: !isWishList}">Done List</div>
        </div>
        <!-- 項目数 -->
        <div class="p-info__summary">
          <p class="p-info__text">Wish List：{{ wishNum }}</p>
          <span class="p-info__text--br">/</span>
          <p class="p-info__text">Done List：{{ doneNum }}</p>
        </div>
      </div>
    </section>

    <!-- リスト -->
    <WishList
      :items="items"
      @send-wish-items="countWish"
      @send-done-items="countDone"
      :is-wish-list="isWishList"
    />
  </div>
</template>

<script>
import WishList from "./WishList";
export default {
  props: {
    items: Array,
    user: Object
  },
  components: {
    WishList
  },
  data() {
    return {
      wishNum: null,
      doneNum: null,
      isWishList: true
    };
  },
  methods: {
    // WishItemを数える
    countWish(wishItems) {
      this.wishNum = wishItems.length;
    },

    // DoneItemを数える
    countDone(doneItems) {
      this.doneNum = doneItems.length;
    },

    // Wishリストを開く
    openWishList() {
      this.isWishList = true;
    },

    // DoneListを開く
    openDoneList() {
      this.isWishList = false;
    }
  }
};
</script>