<template>
  <div class="l-modal__cover">
    <div class="c-modal__container">
      <div class="c-modal__header">
        <i class="fas fa-times-circle u-icon--cancel" @click="clickClose"></i>
      </div>
      <p class="c-modal__text">
        やりたいことを
        <br class="c-modal__br" />書こう！
      </p>
      <form action class="c-form--modal c-modal" @submit.prevent="postWish">
        <label for class="c-form__unit">
          <select name id class="c-form__select" v-model="wishCategory">
            <option value="0">カテゴリ無し</option>
            <option value="1">ライフスタイル</option>
            <option value="2">ホビー</option>
            <option value="3">スキルアップ</option>
            <option value="4">トラベル</option>
            <option value="5">グルメ</option>
          </select>
        </label>
        <label for class="c-form__unit">
          <input type="text" class="c-form__input" v-model="wishText" placeholder="わたしのやりたいこと" />
        </label>
        <input type="submit" value="追加する" class="c-form__submit c-form__unit" />
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      wishCategory: 0,
      wishText: null
    };
  },
  methods: {
    // モーダルを閉じる
    clickClose() {
      this.$emit("close-modal");
    },
    // wishを送信する
    async postWish() {
      let wish = {
        category_id: Number(this.wishCategory),
        text: this.wishText
      };
      // POST送信
      const response = await axios.post("/mypage", wish);
      console.log(response);
      // フォームの入力値を削除してモーダルを閉じる
      this.clearData();
      this.clickClose();
      this.informCreate();
    },
    // フォーム入力値を削除する
    clearData() {
      this.wishCategory = 0;
      this.wishText = null;
    },
    // 登録完了を通知する
    informCreate() {
      this.$emit("inform-create");
    }
  }
};
</script>
