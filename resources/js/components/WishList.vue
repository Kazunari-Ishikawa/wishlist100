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
      :is-open="isOpenCreateModal"
      @close-modal="toggleCreateModal"
      @inform-create="fetchList"
    />
    <EditModal
      :is-open="isOpenEditModal"
      v-model="selectedItem"
      @close-modal="closeEditModal"
      @inform-edit="fetchList"
    />
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
      isOpenCreateModal: false,
      isOpenEditModal: false,
      selectedItem: null,
      wishItems: null,
      doneItems: null
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
      console.log(response);
      this.wishItems = response.data.filter(item => item.done_flg === 0);
      this.doneItems = response.data.filter(item => item.done_flg === 1);
    }
  }
};
</script>
