<template>
  <!-- スマホ・タブレット用 -->
  <nav class="c-spNav__cover" :class="{active: isActive}">
    <div class="c-spNav__iconContainer" @click="clickClose">
      <i class="fas fa-times c-spNav__icon"></i>
      <p class="c-spNav__iconText">CLOSE</p>
    </div>

    <!-- ナビゲーション：未ログイン時 -->
    <ul class="c-nav c-spNav" v-if="!isLogin">
      <li class="c-nav__item c-spNav__item">
        <a href="/" class="c-nav__link">TOP</a>
      </li>
      <li class="c-nav__item c-spNav__item">
        <a href="/register" class="c-nav__link">新規登録</a>
      </li>
      <li class="c-nav__item c-spNav__item">
        <a href="/login" class="c-nav__link">ログイン</a>
      </li>
    </ul>
    <!-- ナビゲーション：ログイン時 -->
    <ul class="c-nav c-spNav" v-else>
      <li class="c-nav__item c-spNav__item">
        <a href="/mypage" class="c-nav__link">マイページ</a>
      </li>
      <li class="c-nav__item c-spNav__item">
        <a href="/settings" class="c-nav__link">アカウント設定</a>
      </li>
      <li class="c-nav__item c-spNav__item">
        <a href="/settings" class="c-nav__link">リスト設定</a>
      </li>
      <li class="c-nav__item c-spNav__item">
        <a class="c-nav__link" @click="doLogout">ログアウト</a>
        <form action="/logout" id="js-logout-form" method="POST" style="display: none;"></form>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    isLogin: Boolean,
    isActive: Boolean
  },
  methods: {
    clickClose() {
      this.$emit("close-menu");
    },
    async doLogout() {
      await axios
        .post("/logout")
        .then(function(response) {
          console.log(response);
          window.location.href = "/";
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>