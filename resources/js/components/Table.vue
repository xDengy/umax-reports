<template>
    <div class="input-group" id = "input-group__title">
        <div class="table__settings">
            <span>Таблица</span>
            <div class="table-label__size__columns">
                <label>сторки</label>
                <input maxlength="3" type="number" :value="tr" @input="setValue('tr', $event.target.value)">
            </div>
            x
            <div class="table-label__size__columns">
                <label>столбцы</label>
                <input maxlength="3" type="number" :value="td" @input="setValue('td', $event.target.value)">
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <td v-for="j in td">
                        <input class="table__element" type="text" :placeholder="j !== 1 || td == 1 ? 'Показатели в %' : ''">
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="index in tr" :class="index % 2 !== 0 ? 'odd' : ''">
                    <td v-for="i in td">
                        <input class="table__element" type="text" :name="'tbody-' + i" placeholder="Значение 1">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "Table",
        props: ["setTr", "setTd"],
        data: () => ({
            tr: 0,
            td: 0
        }),
        methods: {
            close(){
                document.getElementById("input-group__title").remove();
            },
            setValue(name, value) {
                if(value && value !== '' && value > 0) {
                    if((name == 'tr' && value < 6) || (name == 'td' && value < 10))
                        this[name] = parseInt(value)
                }
            }
        },
        beforeMount() {
            this.tr = parseInt(this.setTr)
            this.td = parseInt(this.setTd)
        }
    }
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

    & input.table__element {
        color: #222222;
        height: auto;
        border: none;
        margin-top: 0;
        height: 42px;
        background: transparent;
        font-weight: 600;
        font-size: 16px;
        line-height: 20px;
        width: auto;

        &::placeholder {
            color: #222222
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
        background: #DAE5FF;
    }
    td {
        border: 1px solid #030087;
        border-bottom: none;
        border-right: none;
    }
    table tbody tr:last-child td {
        border-bottom: 1px solid #030087;
    }
    table td:last-child {
        border-right: 1px solid #030087;
    }
}
.table__settings {
    display: flex;
    align-items: center;

    & span {
        margin-right: 5px;
        font-weight: 600;
        font-size: 18px;
        line-height: 20px;
        color: #222222;
    }

    & input {
        width: 50px;
        height: 20px;
        margin-right: 5px;
        margin-left: 5px;
        margin-top: 0;
    }
}
.table-label__size__columns {
    display: flex;
    flex-direction: column;
    align-items: center;

    & label {
        font-weight: 700;
        font-size: 8px;
        line-height: 10px;
    }

    & input {
        padding: 0 15px;
        font-weight: 700;
        font-size: 12px;
        line-height: 15px;
        text-align: center;

        &::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    }
}
</style>