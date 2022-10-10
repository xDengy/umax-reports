<template>
  <div class="table-label">
    <div class="table-label__title">
      Круговая диаграмма
    </div>
    <div class="table-label__size">
      <div class="table-label__size__columns">
        <label>сторки</label>
        <input maxlength="3" type="text" :value="tr" id="tr" @input="setValue('tr', $event.target.value)">
      </div>
      <p>x</p>
      <div class="table-label__size__columns">
        <label>столбцы</label>
        <input readonly type="text" value="4" id="td">
      </div>
    </div>
  </div>
  <div class="table-pieCharts">
    <div class="table-pieCharts__titles" v-for="i in tr" :key="i">
      <div v-for="index in td" :key="index" :class="'table-pieCharts__elements table-pieCharts__elements--col' + index">
        <input type="text" :value="values ? tables[i - 1][index - 1] : null">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PieCharts",
  props: ["values"],
  data: () => ({
    tr: 3,
    td: 4,
    tables: [
    ],
  }),
  beforeMount() {
    if(this.values) {
      let curTable = []
      let tr = this.values[0]
      let td = this.values[1]
      delete this.values[0]
      delete this.values[1]
      let curValues = array_values(this.values)
      curTable = split(curValues, td)
      this.tables = curTable
      this.tr = this.tables.length
      this.td = this.tables[0].length
    }
  },
  methods: {
    close(){
      this.$emit("close", {});
    },
    setValue(name, value) {
        if(value && value !== '' && value > 0) {
            if(name == 'tr') {
              this[name] = parseInt(value)
              if(this.tables[parseInt(value) - 1]) {
              } else {
                this.tables[parseInt(value) - 1] = [
                  null,
                  null,
                  null,
                  null
                ]
              }
            }
        }
    }
  }
}
function split(array, n) {
  let [...arr]  = array;
  var res = [];
  while (arr.length) {
    res.push(arr.splice(0, n));
  }
  return res;
}
function array_values( input ) {
 var tmp_arr = new Array(), cnt = 0;
 for (let key in input ){
  tmp_arr[cnt] = input[key];
  cnt++;
 }
 return tmp_arr;
}
</script>

<style lang="scss" scoped>
.table {

  &-label {
    display: flex;
    align-items: flex-end;
    margin-bottom: 15px;

    &__title {
      font-weight: 600;
      font-size: 18px;
      line-height: 20px;
    }

    &__size {
      display: flex;
      align-items: flex-end;
      margin-left: 10px;

      &__columns {
        display: flex;
        flex-direction: column;
        align-items: center;

        & label {
          font-weight: 700;
          font-size: 8px;
          line-height: 10px;
        }

        & input {
          width: 51px;
          height: 20px;
          border: 1px solid rgba(3, 0, 135, 0.3);
          border-radius: 5px;
          padding: 11px 11px;
        }

      }

      & p {
        font-weight: 600;
        font-size: 16px;
        line-height: 20px;
        margin: 0 5px;
      }
    }

  }

  &-pieCharts {
    margin: 0 auto;

    &__titles {
      border: 1px solid #030087;
      border-right: none;
      border-top: none;
      display: flex;

      &:nth-child(1) {
        border-radius: 5px 5px 0px 0px;
        border-top: 1px solid #030087;
      }

      &:nth-child(2n) {
        background: #DAE5FF;
      }
      
      &:last-child {
        border-radius: 0px 0px 5px 5px;
      }
    }

    &__elements {
      width: 125px;
      display: flex;
      justify-content: center;
      text-align: center;
      border-right: 1px solid #030087;

      &--col1 {
        padding: 12px;
      }

      &--col2 {
        padding: 12px;
      }

      &--col3 {
        padding: 12px;
      }
    }


  }

}

.table-pieCharts__elements input {
  color: #222222;
  height: auto;
  border: none;
  margin-top: 0;
  background: transparent;
  font-weight: 600;
  font-size: 16px;
  line-height: 20px;
  width: 100%;
}
.table-label__size {
  position: relative;
}
.table-label .close {
  top: 12px;
  right: -25px;
  position: absolute;
}
</style>