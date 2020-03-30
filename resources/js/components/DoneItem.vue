<template>
  <div class="p-wishList__item p-wishList__item--done">
    <i class="fas fa-bicycle p-wishList__icon u-icon"></i>
    <div class="p-wishList__contents">
      <p class="p-wishList__text">{{itemData.text}}</p>
      <p class="p-wishList__date">2019/10/12達成！</p>
    </div>
    <i class="fas fa-undo p-wishList__icon u-icon" @click="changeToWish"></i>
  </div>
</template>

<script>
export default {
  props: {
    item: Object
  },
  data() {
    return {
      itemData: this.item
    };
  },
  methods: {
    changeToWish() {
      this.$emit('change-to-wish', this.itemData);
    }
  }
};
</script>
