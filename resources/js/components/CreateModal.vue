<template>
  <div class="l-modal__cover" v-show="isOpen">
    <div class="c-modal__container">
      <div class="c-modal__header">
        <i class="fas fa-times-circle u-icon--cancel" @click="clickClose"></i>
      </div>
      <p class="c-modal__text">
        やりたいことを
        <br class="c-modal__br" />書こう！
      </p>
      <form action class="c-form--modal c-modal">
        <label for class="c-form__unit">
          <select name id class="c-form__select">
            <option value="0">カテゴリ無し</option>
            <option value="1">ライフスタイル</option>
            <option value="2">ホビー</option>
            <option value="3">スキルアップ</option>
            <option value="4">トラベル</option>
            <option value="5">グルメ</option>
          </select>
        </label>
        <label for class="c-form__unit">
          <input type="text" class="c-form__input" placeholder="わたしのやりたいこと" />
        </label>
        <input type="submit" value="追加する" class="c-form__submit c-form__unit" />
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    isOpen: Boolean
  },
  methods: {
    clickClose() {
      this.$emit("close-modal");
    }
  }
};
</script>
