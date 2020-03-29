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
          <a class="c-outlineBtn c-outlineBtn--right" @click="toggleModal">
            新しく
            <br class="c-outlineBtn__br" />追加する
          </a>
        </div>
      </div>
    </div>
    <WishItem />
    <CreateModal :is-open="isOpen" @close-modal="toggleModal" />
  </div>
</template>

<script>
import WishItem from "./WishItem";
import CreateModal from "./CreateModal";
export default {
  components: {
    WishItem,
    CreateModal
  },
  data() {
    return {
      isOpen: false
    };
  },
  methods: {
    toggleModal() {
      this.isOpen = !this.isOpen;
    }
  }
};
</script>
