<template>
  <header class="l-header">
    <h1 class="p-hero__title">わたしの100のリスト</h1>

    <!-- ハンバーガーメニュー -->
    <div class="c-triggerMenu">
      <span class="c-triggerMenu__bar"></span>
      <span class="c-triggerMenu__bar"></span>
      <span class="c-triggerMenu__bar"></span>
    </div>

    <!-- ナビメニュー -->
    <Navbar :isLogin="this.isLogin"></Navbar>
  </header>
</template>

<script>
import Navbar from "./NavbarComponent";
export default {
  components: {
    Navbar
  },
  data() {
    return {
      isLogin: false
    };
  },
  methods: {}
};
</script>