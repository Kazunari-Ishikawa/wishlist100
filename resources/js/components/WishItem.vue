<template>
  <div class="p-wishList__item">
    <div class="p-wishList__icon" @click="openEdit">
      <i class="far fa-calendar-alt u-icon" v-if="itemData.category_id == 1"></i>
      <i class="fas fa-futbol u-icon" v-else-if="itemData.category_id == 2"></i>
      <i class="fas fa-level-up-alt u-icon" v-else-if="itemData.category_id == 3"></i>
      <i class="fas fa-plane u-icon" v-else-if="itemData.category_id == 4"></i>
      <i class="fas fa-utensils u-icon" v-else-if="itemData.category_id == 5"></i>
      <i class="far fa-grin u-icon" v-else></i>
    </div>
    <div class="p-wishList__contents" @click="openEdit">
      <p class="p-wishList__text">{{itemData.text}}</p>
      <p class="p-wishList__date">{{itemYear}}/{{itemMonth}}/{{itemDay}}登録</p>
    </div>
    <div class="p-wishList__icon" @click="changeToDone">
      <i class="far fa-thumbs-up u-icon--done"></i>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: Object
  },
  computed: {
    itemData() {
      return this.item;
    },
    itemYear() {
      return this.itemData.created_at.slice(0, 4);
    },
    itemMonth() {
      return this.itemData.created_at.slice(5, 7);
    },
    itemDay() {
      return this.itemData.created_at.slice(8, 10);
    }
  },
  methods: {
    // Editモーダル開を通知する
    openEdit() {
      this.$emit("open-edit", this.itemData);
    },

    // Done状態への変更を通知する
    changeToDone() {
      this.$emit("change-to-done", this.itemData);
    }
  }
};
</script>
