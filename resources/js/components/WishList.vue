<template>
  <section id="WishList" class="l-container p-wishList u-main">
    <div class="p-wishList__header">
      <select class="c-form__select p-wishList__headerBtn" v-model="sortId" @change="sortList">
        <option value="0">全て</option>
        <option value="1">ライフスタイル</option>
        <option value="2">ホビー</option>
        <option value="3">スキルアップ</option>
        <option value="4">トラベル</option>
        <option value="5">グルメ</option>
      </select>
      <div class="p-wishList__headerBtn" @click="toggleCreateModal">
        <p>
          新しく
          <br class="p-wishList__br" />登録する
        </p>
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
    items: Array,
    isWishList: Boolean
  },
  data() {
    return {
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
