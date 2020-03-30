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
          <div class="c-outlineBtn c-outlineBtn--right" @click="toggleCreateModal">
            新しく
            <br class="c-outlineBtn__br" />追加する
          </div>
        </div>
      </div>
    </div>

    <template>
      <template v-if="isWishList">
        <WishItem
          v-for="item in wishItems"
          :key="item.id"
          :item="item"
          @open-edit="openEdit"
          @change-to-done="changeToDone"
        />
      </template>
      <template v-else>
        <DoneItem
          v-for="item in doneItems"
          :key="item.id"
          :item="item"
          @change-to-wish="changeToWish"
        />
      </template>
    </template>

    <CreateModal :is-open="isOpen" @close-modal="toggleCreateModal" />
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
  computed: {
    wishItems() {
      return this.items.filter(item => item.done_flg === 0);
    },
    doneItems() {
      return this.items.filter(item => item.done_flg === 1);
    }
  },
  methods: {
    openWishList() {
      this.isWishList = true;
    },

    openDoneList() {
      this.isWishList = false;
    },

    toggleCreateModal() {
      this.isOpen = !this.isOpen;
    },

    openEdit(itemData) {
      this.selectedItem = itemData;
      this.openItem = true;
    },

    closeEdit() {
      this.openItem = false;
    },

    async changeToDone(itemData) {
      console.log(itemData.id);
      const response = await axios.post(`/mypage/${itemData.id}/done`);
      console.log(response);
    },

    async changeToWish(itemData) {
      console.log(itemData.id);
      const response = await axios.post(`/mypage/${itemData.id}/wish`);
      console.log(response);
    }
  }
};
</script>
