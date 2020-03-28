<template>
  <header class="l-header">
    <h1 class="p-hero__title">わたしの100のリスト</h1>

    <!-- ハンバーガーメニュー -->
    <div class="c-triggerMenu" @click="isActive = !isActive">
      <span class="c-triggerMenu__bar"></span>
      <span class="c-triggerMenu__bar"></span>
      <span class="c-triggerMenu__bar"></span>
    </div>

    <!-- ナビメニュー -->
    <Navbar :is-login="isLogin" :is-active="isActive" @close-menu="toggleMenu" />
  </header>
</template>

<script>
import Navbar from "./NavbarComponent.vue";
export default {
  props: {
    isLogin: Boolean
  },
  components: {
    Navbar
  },
  data() {
    return {
      isActive: false
    };
  },
  mounted() {
    console.log(this.isLogin);
  },
  methods: {
    toggleMenu() {
      console.log("Clicked");
      this.isActive = !this.isActive;
    }
  }
};
</script>