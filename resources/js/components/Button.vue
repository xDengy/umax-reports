<template>
  <div>

  </div>
  <div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Заголовок</label>
        <div class="input-group__wrap">
          <input  :value="values ? values[0] : null" type="text" placeholder="Новая кнопка" />
        </div>
      </div>
    </div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Ссылка</label>
        <div class="input-group__wrap">
          <input type="text" :value="values ? values[1] : null" placeholder="#" />
        </div>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Цвет заливки</label>
        <div class="input-group__wrap">
          <input type="text" :value="values ? values[2] : null" placeholder="#030087" />
        </div>
      </div>
    </div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Цвет текста</label>
        <div class="input-group__wrap">
          <input type="text" :value="values ? values[3] : null" placeholder="#FFFFFF" />
        </div>
      </div>
    </div>
    <div>
      <div class="input-group" id="input-group__title">
        <label>Цвет обводки</label>
        <div class="input-group__wrap">
          <input type="text" :value="values ? values[4] : null" placeholder="#030087" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["values", 'elementId'],
}
</script>

<style>

</style>