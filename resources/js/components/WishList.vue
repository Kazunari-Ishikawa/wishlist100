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
    <WishItem v-for="item in items" :key="item.id" :item="item" @open-edit="openEdit" />
    <CreateModal :is-open="isOpen" @close-modal="toggleModal" />
    <EditModal :open-item="openItem" v-model="selectedItem" @close-item="closeEdit" />
  </div>
</template>

<script>
import WishItem from "./WishItem";
import CreateModal from "./CreateModal";
import EditModal from "./EditModal";
export default {
  components: {
    WishItem,
    CreateModal,
    EditModal
  },
  props: {
    items: Array
  },
  data() {
    return {
      isOpen: false,
      openItem: false,
      selectedItem: null
    };
  },
  methods: {
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
