<template>
    <div class="input-group" id = "input-group__title">
        <label>Заголовок</label>
        <div class="input-group__wrap">
            <div class="close" @click="close()">
                <svg width="13" height="13" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                    data-v-59c35ec8="">
                    <line x1="1.06066" y1="1" x2="13" y2="12.9393" stroke="#222222" stroke-width="1.5"
                        stroke-linecap="round" data-v-59c35ec8=""></line>
                    <path d="M1 13.293L13.2929 1.00008" stroke="#222222" stroke-width="1.5" stroke-linecap="round"
                        data-v-59c35ec8=""></path>
                </svg>
            </div>
            <input type="text" placeholder="Заголовок" />
        </div>
    </div>
</template>

<script>
    export default {
        name: "Title",
        data: () => ({

         }),
         methods: {
            close(){
                document.getElementById("input-group__title").remove();
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