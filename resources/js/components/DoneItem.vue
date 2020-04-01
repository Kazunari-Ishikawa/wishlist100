<template>
  <div class="p-wishList__item p-wishList__item--done">
    <div class="p-wishList__icon">
      <i class="far fa-calendar-alt u-icon" v-if="itemData.category_id == 1"></i>
      <i class="fas fa-futbol u-icon" v-else-if="itemData.category_id == 2"></i>
      <i class="fas fa-level-up-alt u-icon" v-else-if="itemData.category_id == 3"></i>
      <i class="fas fa-plane u-icon" v-else-if="itemData.category_id == 4"></i>
      <i class="fas fa-utensils u-icon" v-else-if="itemData.category_id == 5"></i>
      <i class="far fa-grin u-icon" v-else></i>
    </div>
    <div class="p-wishList__contents">
      <p class="p-wishList__text">{{itemData.text}}</p>
      <p class="p-wishList__date">{{itemYear}}/{{itemMonth}}/{{itemDay}}達成！</p>
    </div>
    <div class="p-wishList__icon" @click="changeToWish">
      <i class="fas fa-undo u-icon"></i>
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
