<template>
  <div class="l-modal__cover">
    <div class="c-modal__container">
      <div class="c-modal__header">
        <i class="fas fa-times-circle u-icon--cancel" @click="clickClose"></i>
        <i class="far fa-trash-alt u-icon--delete" @click="deleteWish"></i>
      </div>
      <p class="c-modal__text">
        変更しちゃうの！？
        <br class="c-modal__br" />
      </p>

      <!-- TODO 一時的な入れ替え -->
      <form action name="editModal" class="c-form--modal c-modal" @submit.prevent="postWish">
        <label for class="c-form__unit">
          <input type="text" class="c-form__input" name="editInput" :value="item.text" />
        </label>
        <label for class="c-form__unit">
          <select class="c-form__select" name="editSelect" :value="item.category_id">
            <option value="0">カテゴリ無し</option>
            <option value="1">ライフスタイル</option>
            <option value="2">ホビー</option>
            <option value="3">スキルアップ</option>
            <option value="4">トラベル</option>
            <option value="5">グルメ</option>
          </select>
        </label>
        <input type="submit" value="変更する" class="c-form__submit c-form__unit" />
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: Object
  },
  data() {
    return {
      id: null
    };
  },
  methods: {
    // モーダルを閉じる
    clickClose() {
      this.$emit("close-modal");
    },
    // やりたいことを送信する
    async postWish() {
      this.id = this.item.id;
      let wish = {
        category_id: document.forms.editModal.editSelect.value,
        text: document.forms.editModal.editInput.value
      };
      // POST送信
      const response = await axios.post(`/mypage/${this.id}`, wish);
      // フォームの入力値を削除してモーダルを閉じる
      this.clearData();
      this.clickClose();
      this.informEdit();
    },
    // フォーム入力値を削除する
    clearData() {
      this.id = null;
      this.wishCategory = 0;
      this.wishText = null;
    },
    // 編集完了を通知する
    informEdit() {
      this.$emit("inform-edit");
    },
    // やりたいことの削除
    async deleteWish() {
      this.id = this.item.id;
      // 確認を出す
      if (confirm("ほんとに削除するの？")) {
        // POST送信
        const response = await axios.post(`/mypage/${this.id}/delete`);
        // フォームの入力値を削除してモーダルを閉じる
        this.clearData();
        this.clickClose();
        this.informEdit();
      }
    }
  }
};
</script>
