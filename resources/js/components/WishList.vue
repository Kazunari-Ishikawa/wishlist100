<template>
  <div class="p-wishList">
    <div class="p-wishList__header">
      <div class="p-wishList__listBtn">
        <div class="c-outlineBtn__container c-outlineBtn__container--left">
          <div class="c-outlineBtn">Wish List</div>
          <div class="c-outlineBtn">Done List</div>
        </div>
      </div>
      <div class="p-wishList__createBtn">
        <div class="c-outlineBtn__container c-outlineBtn__container--right">
          <div class="c-outlineBtn c-outlineBtn--right" @click="toggleModal">
            新しく
            <br class="c-outlineBtn__br" />追加する
          </div>
        </div>
      </div>
    </div>
    <WishItem v-for="item in items" :key="item.id" :item="item" />
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
  props: {
    items: Array
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
