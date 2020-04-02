<template>
  <section id="WishList" class="l-container p-wishList u-main">
    <div class="p-wishList__header">
      <div class="p-wishList__header--left c-outlineBtn__container">
        <div class="c-outlineBtn c-outlineBtn--en" @click="openWishList">Wish List</div>
        <div class="c-outlineBtn c-outlineBtn--en" @click="openDoneList">Done List</div>
      </div>
      <div class="p-wishList__header--right c-outlineBtn__container">
        <select
          class="c-form__select c-outlineBtn c-outlineBtn--select"
          name="editSelect"
          v-model="sortId"
          @change="sortList"
        >
          <option value="0">全て</option>
          <option value="1">ライフスタイル</option>
          <option value="2">ホビー</option>
          <option value="3">スキルアップ</option>
          <option value="4">トラベル</option>
          <option value="5">グルメ</option>
        </select>
        <div class="c-outlineBtn c-outlineBtn--right" @click="toggleCreateModal">
          新規
          <br class="c-outlineBtn__br" />登録
        </div>
      </div>
    </div>

    <template>
      <template v-if="isWishList">
        <WishItem
          v-for="item in wishItems"
          :key="item.id"
          :item="item"
          @open-edit="openEditModal"
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

    <CreateModal
      v-if="isOpenCreateModal"
      @close-modal="toggleCreateModal"
      @inform-create="fetchList"
    />
    <EditModal
      v-if="isOpenEditModal"
      :item="selectedItem"
      @close-modal="closeEditModal"
      @inform-edit="fetchList"
    />
  </section>
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
      isOpenCreateModal: false,
      isOpenEditModal: false,
      selectedItem: null,
      wishItems: null,
      doneItems: null,
      sortId: 0,
      updatedItems: this.items
    };
  },
  created() {
    this.fetchList();
  },
  methods: {
    openWishList() {
      this.isWishList = true;
    },

    openDoneList() {
      this.isWishList = false;
    },

    toggleCreateModal() {
      this.isOpenCreateModal = !this.isOpenCreateModal;
    },

    openEditModal(itemData) {
      this.selectedItem = itemData;
      this.isOpenEditModal = true;
    },

    closeEditModal() {
      this.isOpenEditModal = false;
    },

    async changeToDone(itemData) {
      const response = await axios.post(`/mypage/${itemData.id}/done`);
      this.fetchList();
    },

    async changeToWish(itemData) {
      const response = await axios.post(`/mypage/${itemData.id}/wish`);
      this.fetchList();
    },

    async fetchList() {
      const response = await axios.get("/mypage/fetch");
      this.updatedItems = response.data;
      this.sortId = 0;
      this.wishItems = response.data.filter(item => item.done_flg == false);
      this.doneItems = response.data.filter(item => item.done_flg == true);
      this.sendWishItems();
      this.sendDoneItems();
    },

    sendWishItems() {
      this.$emit("send-wish-items", this.wishItems);
    },

    sendDoneItems() {
      this.$emit("send-done-items", this.doneItems);
    },

    sortList() {
      if (this.sortId != 0) {
        this.wishItems = this.updatedItems.filter(
          item => item.category_id == this.sortId && item.done_flg == false
        );
        this.doneItems = this.updatedItems.filter(
          item => item.category_id == this.sortId && item.done_flg == true
        );
      } else {
        this.wishItems = this.updatedItems.filter(
          item => item.done_flg == false
        );
        this.doneItems = this.updatedItems.filter(
          item => item.done_flg == true
        );
      }
    }
  }
};
</script>
