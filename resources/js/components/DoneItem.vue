<template>
  <div class="p-wishList__item p-wishList__item--done">
    <i class="fas fa-bicycle p-wishList__icon u-icon"></i>
    <div class="p-wishList__contents">
      <p class="p-wishList__text">{{itemData.text}}</p>
      <p class="p-wishList__date">{{itemYear}}/{{itemMonth}}/{{itemDay}}達成！</p>
    </div>
    <i class="fas fa-undo p-wishList__icon u-icon" @click="changeToWish"></i>
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
      return this.item.updated_at.slice(0, 4);
    },
    itemMonth() {
      return this.item.updated_at.slice(5, 7);
    },
    itemDay() {
      return this.item.updated_at.slice(8, 10);
    }
  },
  methods: {
    changeToWish() {
      this.$emit("change-to-wish", this.itemData);
    }
  }
};
</script>
