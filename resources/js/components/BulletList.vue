<template>
  <div class="numbered-list">
    <p class="numbered-list__title">Маркированный список</p>
    <ul class="numbered-list__ul">
      <li v-for="(liCount, i) in ul" :key="i"><input type="text" :placeholder="liCount" :value="values ? liCount : null"></li>
    </ul>
    <div class="numbered-list__button" @click="addLi()">
      <svg width="19" height="19" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="25" cy="25" r="24" stroke="#030087" stroke-width="2" />
        <line x1="25" y1="15" x2="25" y2="35" stroke="#030087" stroke-width="2" stroke-linecap="round" />
        <line x1="15" y1="25" x2="35" y2="25" stroke="#030087" stroke-width="2" stroke-linecap="round" />
      </svg>
      Добавить пункт
    </div>
  </div>
</template>

<script>
export default {
  name: "BulletList",
  props: ["values", 'elementId'],
  data: () => ({
    ul: [
      "Значение 1",
      "Значение 2",
      "Значение 3"
    ],
  }),
  beforeMount() {
    if(this.values)
      this.ul = this.values
  },
  methods: {
    close(){
      this.$emit("close", {});
    },
    addLi() {
      this.ul.push('Значение ' + (parseInt(this.ul.length) + 1))
    }
  }
}
</script>

<style lang="scss" scoped>
.numbered-list {
  border: 1px solid rgba(3, 0, 135, 0.3);
  border-radius: 5px;
  padding: 30px;
  width: 100%;

  &__title {
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
    user-select: none;
    display: flex;
  }

  &__ul {
    margin-left: 15px;
    margin-top: 10px;
    position: relative;

    & li {
      list-style: initial;
    }

    & input {
      border: 0;
      width: 100%;
    }
  }

  &__button {
    border: 1px solid rgba(3, 0, 135, 0.3);
    border-radius: 5px;
    margin-top: 30px;
    padding: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    user-select: none;

    & svg {
      margin-right: 15px;
    }
  }
}
.numbered-list .close {
  margin-left: 10px;
  height: 15px;
}
</style>