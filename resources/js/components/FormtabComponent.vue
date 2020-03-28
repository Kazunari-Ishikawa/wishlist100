<template>
  <div class="p-formTab">
    <div class="p-formTab__item" :class="{notActive: isLoginForm}">
      <a href="/register" class="p-formTab__link" :class="{notActive: isLoginForm}">新規登録</a>
    </div>
    <div class="p-formTab__item" :class="{notActive: !isLoginForm}">
      <a href="/login" class="p-formTab__link" :class="{notActive: !isLoginForm}">ログイン</a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    isLoginForm: Boolean
  }
};
</script>
