<template>
  <div class="p-wishList__item">
    <i class="fas fa-bicycle p-wishList__icon u-icon"></i>
    <div class="p-wishList__contents">
      <p class="p-wishList__text">{{data.text}}</p>
      <p class="p-wishList__date">2019/10/12登録</p>
    </div>
    <i class="far fa-thumbs-up p-wishList__icon u-icon u-icon--done"></i>
  </div>
</template>

<script>
export default {
  props: {
    item: Object
  },
  data() {
    return {
      data: null
    };
  },
  mounted() {
    this.data = this.item;
  },
};
</script>
