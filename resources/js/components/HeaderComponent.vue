<template>
  <header class="l-header">
    <h1 v-if="isLogin" class="p-hero__title">{{user.name}}さんの100のリスト</h1>
    <h1 v-else class="p-hero__title">わたしの100のリスト</h1>
    <!-- ハンバーガーメニュー -->
    <div class="c-triggerMenu" @click="isActive = !isActive" :class="{show: !isActive}">
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
    isLogin: Boolean,
    user: Object
  },
  components: {
    Navbar
  },
  data() {
    return {
      isActive: false
    };
  },
  methods: {
    // メニューを開閉する
    toggleMenu() {
      this.isActive = !this.isActive;
    }
  }
};
</script>