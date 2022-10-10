<template>
    <div class="input-group" id = "input-group__textArea">
        <label>Текст</label>
        <div class="input-group__wrap">
            <textarea name="" id="" cols="30" rows="10" :value="values ? values[0] : null"></textarea>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TextArea",
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

    & textarea {
        padding: 26px 30px;
        border: 1px solid rgba(3, 0, 135, 0.3);
        border-radius: 5px;
        resize: none;
        width: 100%;
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