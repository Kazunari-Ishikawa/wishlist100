<template>
  <div class="p-wishList">
    <div class="p-wishList__header">
      <div class="p-wishList__listBtn">
        <div class="c-outlineBtn__container c-outlineBtn__container--left">
          <div class="c-outlineBtn" @click="openWishList">Wish List</div>
          <div class="c-outlineBtn" @click="openDoneList">Done List</div>
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

    <template>
      <template v-if="isWishList">
        <WishItem v-for="item in items" :key="item.id" :item="item" @open-edit="openEdit" />
      </template>
      <template v-else>
        <DoneItem v-for="item in items" :key="item.id" :item="item" />
      </template>
    </template>

    <CreateModal :is-open="isOpen" @close-modal="toggleModal" />
    <EditModal :open-item="openItem" v-model="selectedItem" @close-item="closeEdit" />
  </div>
</template>

<script>
import WishItem from "./WishItem";
import DoneItem from "./DoneItem";
import CreateModal from "./CreateModal";
import EditModal from "./EditModal";
export default {
  components: {
    WishItem,
    DoneItem,
    CreateModal,
    EditModal
  },
  props: {
    items: Array
  },
  data() {
    return {
      isWishList: true,
      isOpen: false,
      openItem: false,
      selectedItem: null
    };
  },
  methods: {
    openWishList() {
      this.isWishList = true;
    },
    openDoneList() {
      this.isWishList = false;
    },
    toggleModal() {
      this.isOpen = !this.isOpen;
    },
    openEdit(itemData) {
      this.selectedItem = itemData;
      this.openItem = true;
    },
    closeEdit() {
      this.openItem = false;
    }
  }
};
</script>
