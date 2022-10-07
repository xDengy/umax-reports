<template>
  <div class="input-group" id="input-group__title">
    <table>
      <tbody>
        <tr class="trHead">
          <td class="table__element tdHead">
            <img src="../assets/images/visitors.svg" />
            Посетители
          </td>
          <td class="table__element tdHead">
            <img src="../assets/images/new_visitors.svg" />
            Новые посетители
          </td>
          <td class="table__element tdHead">
            <img src="../assets/images/deep.svg" />
            Глубина
          </td>
          <td class="table__element tdHead">
            <img src="../assets/images/views.svg" />
            Просмотры
          </td>
          <td class="table__element tdHead">
            <img src="../assets/images/cancels.svg" />
            Отказы
          </td>
          <td class="table__element tdHead">
            <img src="../assets/images/time.svg" />
            Время на сайте
          </td>
        </tr>
        <tr>
          <td v-for="index in 6" class="tdMain">
            <input
              class="table__element"
              type="text"
              :name="'tbody-' + index"
              placeholder="0"
              :value="values ? tables[index - 1] : null"
            />
          </td>
        </tr>
        <tr>
          <td v-for="item in tdFooter" class="table__element tdFooter">
            {{ item }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "TableGraph",
  props: ["values", "elementId"],
  data: () => ({
    tdFooter: [
      "Количество уникальных посетителей",
      "Процент уникальных посетителей, посетивших сайт в отчетном периоде, активность которых включала их самый первый за всю историю накопления данных визит на сайт",
      "Количество страниц, просмотренных посетителем во время визита",
      "Число просмотров страниц на сайте за отчетный период",
      "Доля визитов, когда состоялся лишь один просмотр страницы, продолжавшийся менее 15 секунд",
      "Средняя продолжительность визита в минутах и секундах",
    ],
    tables: []
  }),
  methods: {
    close() {
      document.getElementById("input-group__title").remove();
    },
  },
  beforeMount() {
    if (this.values) {
      this.tables = this.values;
    }
  },
};
</script>

<style lang="scss" scoped>
.input-group {
  & label {
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 20px;
    color: #222222;
  }

  & .table__element {
    color: #222222;
    height: auto;
    margin-top: 0;
    background: transparent;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
  }

  & .tdHead {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  & input {
    border: none;
    height: 42px;

    &::placeholder {
      color: #222222;
    }
  }

  .input-group__wrap {
    position: relative;
  }

  .close {
    position: absolute;
    top: 15px;
    right: 10px;
    cursor: pointer;
  }
  table {
    display: flex;
    flex-direction: column;
    margin-top: 15px;
    width: fit-content;
  }
  tr {
    display: flex;
  }
  tr.odd td {
    background: #dae5ff;
  }
}

.input-group .table__element.tdFooter {
  font-weight: 250;
  color: #3e3e3e;
  font-size: 14px;
  line-height: 14px;
  padding-top: 25px;
}
.input-group .table__element.tdHead {
  font-weight: 400;
  font-size: 20px;
  line-height: 20px;
  color: #3e3e3e;
}
.input-group .trHead {
  border: 1px solid #e9e9e9;
  border-radius: 10px;
}
.input-group tr {
  padding: 15px;
}
.input-group .table__element.tdHead img {
  margin-bottom: 10px;
}

.input-group .tdMain input {
  font-weight: 700;
  font-size: 42px;
  line-height: 42px;
  color: #5a5a5a;
  padding: 0 5px;

  &::placeholder {
    color: #5a5a5a;
  }
}

.input-group .tdMain {
  margin-top: 50px;
  padding-bottom: 40px;
  border-bottom: 1px solid #e9e9e9;
}
</style>