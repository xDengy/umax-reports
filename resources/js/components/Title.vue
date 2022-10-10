<template>
    <div class="input-group" id = "input-group__title">
        <label>Заголовок</label>
        <div class="input-group__wrap">
            <input type="text" placeholder="Заголовок" :value="values ? values[0] : null" />
        </div>
    </div>
</template>

<script>
    export default {
        name: "Title",
        props: ["values", 'elementId'],
        data: () => ({

         }),
         methods: {
            close(){
                this.$emit("close", {});
            }
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

    & input {
        font-weight: 400;
        color: #222222;
        font-size: 28px;
        line-height: 36px;

        &::placeholder {
            font-weight: 400;
            color: #222222;
            font-size: 28px;
            line-height: 36px;
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

}
</style>