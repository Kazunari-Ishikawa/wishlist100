<template>
  <div class="l-modal__cover" v-show="openItem">
    <div class="c-modal__container">
      <div class="c-modal__header">
        <i class="far fa-trash-alt u-icon--delete" @click="deleteWish"></i>
        <i class="fas fa-times-circle u-icon--cancel" @click="clickClose"></i>
      </div>
      <p class="c-modal__text">
        変更しちゃうの！？
        <br class="c-modal__br" />
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
          <input type="text" class="c-form__input" v-model="wishText" />
        </label>
        <input type="submit" value="変更する" class="c-form__submit c-form__unit" />
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    openItem: Boolean
  },
  data() {
    return {
      id: null,
      wishCategory: 0,
      wishText: null
    };
  },
  methods: {
    // モーダルを閉じる
    clickClose() {
      this.$emit("close-item");
    },
    // やりたいことを送信する
    async postWish() {
      this.id = this.$attrs.value.id;
      let wish = {
        category_id: Number(this.wishCategory),
        text: this.wishText
      };
      // POST送信
      const response = await axios.post(`/mypage/${this.id}`, wish);
      console.log(response);
      // フォームの入力値を削除してモーダルを閉じる
      this.clearData();
      this.clickClose();
    },
    // フォーム入力値を削除する
    clearData() {
      this.id = null;
      this.wishCategory = 0;
      this.wishText = null;
    },
    // やりたいことの削除
    async deleteWish() {
      this.id = this.$attrs.value.id;
      // 確認を出す
      if (confirm("ほんとに削除するの？")) {
        console.log("削除します");
        // POST送信
        const response = await axios.post(`/mypage/${this.id}/delete`);
        console.log(response);
        // フォームの入力値を削除してモーダルを閉じる
        this.clearData();
        this.clickClose();
      }
    }
  }
};
</script>
