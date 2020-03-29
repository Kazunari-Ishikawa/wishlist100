<template>
  <div class="c-message__container c-message__container--flash" :class="{active: isActive}">
    <div class="c-message__text">{{message}}</div>
  </div>
</template>

<script>
export default {
  props: {
    message: String
  },
  data() {
    return {
      isActive: true
    };
  },
  mounted() {
    this.isActive = true;
    setTimeout(this.closeMessage, 3000);
  },
  methods: {
    closeMessage() {
      this.isActive = false;
    }
  }
};
</script>
