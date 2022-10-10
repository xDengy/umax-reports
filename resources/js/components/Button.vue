<template>
  <div>

  </div>
  <div>
    <a target="_blank" :href="values ? values[1] : ''" class="elements-buttons__button" :style="values ? 'background: ' + values[2] + '; color: ' + values[3] + '; border-color: ' + values[4] + ';' : ''">
      {{values ? values[0] : 'Кнопка'}}
    </a>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Заголовок</label>
        <div class="input-group__wrap">
          <input @input="input($event.target.value, 'title')" :value="values ? values[0] : null" type="text" placeholder="Новая кнопка" />
        </div>
      </div>
    </div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Ссылка</label>
        <div class="input-group__wrap">
          <input @input="input($event.target.value, 'link')" type="text" :value="values ? values[1] : null" placeholder="https://" />
        </div>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Цвет заливки</label>
        <div class="input-group__wrap">
          <input @input="input($event.target.value, 'background')" type="text" :value="values ? values[2] : null" placeholder="#030087" />
        </div>
      </div>
    </div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Цвет текста</label>
        <div class="input-group__wrap">
          <input @input="input($event.target.value, 'color')" type="text" :value="values ? values[3] : null" placeholder="#FFFFFF" />
        </div>
      </div>
    </div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Цвет обводки</label>
        <div class="input-group__wrap">
          <input @input="input($event.target.value, 'borderColor')" type="text" :value="values ? values[4] : null" placeholder="#030087" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Button",
  props: ["values"],
  methods: {
    input(value, type) {
      let btn = this.$el.parentElement.querySelector('.elements-buttons__button')
      if(type == 'title') {
        this.values[0] = value
      } else if (type == 'link') {
        this.values[1] = value
      } else {
        btn.style[type] = value
      }
    }
  }
}
</script>

<style>
.elements-buttons__button {
    width: 100%;
    margin-bottom: 30px;
    height: 55px;
    background: #030087;
    border: 1px solid #030087;
    color: #ffffff;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
    cursor: pointer;
}
</style>