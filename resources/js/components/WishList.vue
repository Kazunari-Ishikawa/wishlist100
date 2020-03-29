<template>
  <div class="p-wishList">
    <div class="p-wishList__header">
      <div class="p-wishList__listBtn">
        <div class="c-outlineBtn__container c-outlineBtn__container--left">
          <a href="/mypage" class="c-outlineBtn">Wish List</a>
          <a href="/mypage/done" class="c-outlineBtn">Done List</a>
        </div>
      </div>
      <div class="p-wishList__createBtn">
        <div class="c-outlineBtn__container c-outlineBtn__container--right">
          <a href="/mypage/new" class="c-outlineBtn c-outlineBtn--right">
            新しく
            <br class="c-outlineBtn__br" />追加する
          </a>
        </div>
      </div>
    </div>

    <WishItem />
  </div>
</template>

<script>
import WishItem from "./WishItem";
export default {
  components: {
    WishItem
  }
};
</script>
