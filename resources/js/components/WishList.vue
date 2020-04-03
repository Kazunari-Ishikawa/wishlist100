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
      updatedItems: this.items,
      sortId: 0
    };
  },
  created() {
    this.fetchList();
  },
  methods: {
    // CreateModalの開閉状態を操作する
    toggleCreateModal() {
      this.isOpenCreateModal = !this.isOpenCreateModal;
    },

    // EditModalを開く
    openEditModal(itemData) {
      this.selectedItem = itemData;
      this.isOpenEditModal = true;
    },

    // EditModalを閉じる
    closeEditModal() {
      this.isOpenEditModal = false;
    },

    // Done状態への変更処理
    async changeToDone(itemData) {
      const response = await axios.post(`/mypage/${itemData.id}/done`);
      this.fetchList();
    },

    // Wish状態への変更処理
    async changeToWish(itemData) {
      const response = await axios.post(`/mypage/${itemData.id}/wish`);
      this.fetchList();
    },

    // 表示するリストをDBから取得する
    async fetchList() {
      const response = await axios.get("/mypage/fetch");
      this.updatedItems = response.data;
      this.sortId = 0; //更新時、ソート用のカテゴリIDは0とする
      this.wishItems = response.data.filter(item => item.done_flg == false);
      this.doneItems = response.data.filter(item => item.done_flg == true);
      this.sendWishItems();
      this.sendDoneItems();
    },

    // WishItemsが更新されたことを通知する
    sendWishItems() {
      this.$emit("send-wish-items", this.wishItems);
    },

    // DoneItemsが更新されたことを通知する
    sendDoneItems() {
      this.$emit("send-done-items", this.doneItems);
    },

    // リストをWish・Done別、カテゴリID別にソートする
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
