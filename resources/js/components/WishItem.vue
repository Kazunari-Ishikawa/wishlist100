<template>
  <div class="p-wishList__item">
    <i class="fas fa-bicycle p-wishList__icon u-icon" @click="openEdit"></i>
    <div class="p-wishList__contents" @click="openEdit">
      <p class="p-wishList__text">{{itemData.text}}</p>
      <p class="p-wishList__date">2019/10/12登録</p>
    </div>
    <i class="far fa-thumbs-up p-wishList__icon u-icon u-icon--done" @click="changeToDone"></i>
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
    }
  },
  methods: {
    openEdit() {
      this.$emit("open-edit", this.itemData);
    },

    changeToDone() {
      this.$emit("change-to-done", this.itemData);
    }
  }
};
</script>
