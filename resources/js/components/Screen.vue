<template>
  <div class="screen" :id="'screen-' + screenNumber">
    <div class="screen__top">
      <div class="screen__top-title" @mouseleave="leaveTitle(screenNumber)">
        <input
          type="text"
          :value="curtitle"
          @input="setTitle(screenNumber - 1, $event.target.value)"
        />
        <span>{{ curtitle }}</span>
        <svg
          width="14"
          height="16"
          viewBox="0 0 14 16"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          @click="editTitle(screenNumber)"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M9.43785 0.0483159C9.19458 0.0997631 8.82307 0.250573 8.55271 0.407665C8.41928 0.485211 7.45003 1.43552 4.6529 4.23124C1.18643 7.69596 0.923072 7.96663 0.820021 8.17039C0.759197 8.29072 0.69381 8.43841 0.674775 8.49858C0.65574 8.55874 0.499304 9.28301 0.327178 10.1081C0.101228 11.1909 0.0143056 11.6691 0.0146495 11.8271C0.0164623 12.6953 0.590009 13.346 1.46252 13.4698C1.6689 13.499 1.7422 13.4875 3.26045 13.1858C4.13096 13.0128 4.91355 12.8492 4.9995 12.8221C5.43959 12.6837 5.28828 12.8241 9.13526 8.98532C11.1177 7.00714 12.8083 5.30316 12.8921 5.1987C13.6763 4.2222 13.7083 2.76505 12.9685 1.72826C12.7586 1.43414 11.8467 0.53072 11.6357 0.407884C11.356 0.245009 10.9906 0.099263 10.7285 0.0459404C10.4223 -0.0163214 9.73762 -0.0150712 9.43785 0.0483159ZM10.5873 1.74173C10.7399 1.817 10.8809 1.93758 11.2411 2.30099C11.6261 2.68929 11.7172 2.79962 11.8037 2.9825C11.8968 3.17913 11.9071 3.22851 11.9071 3.482C11.9071 3.73408 11.8966 3.7854 11.8063 3.97609C11.7114 4.17641 11.496 4.3998 8.13754 7.78085C5.26577 10.6719 4.55057 11.3763 4.472 11.3907C3.9423 11.4876 1.63949 11.8606 1.63949 11.8495C1.63949 11.8414 1.76658 11.1862 1.92189 10.3933L2.20432 8.95179L5.74292 5.41068C7.68917 3.46309 9.32848 1.84016 9.38584 1.80421C9.72037 1.59455 10.2348 1.56779 10.5873 1.74173ZM0.599229 14.4711C0.354151 14.5292 0.182181 14.6704 0.0912265 14.8882C0.0270268 15.0419 0.0240262 15.3882 0.0856629 15.5357C0.153144 15.6972 0.308768 15.8597 0.467423 15.9342L0.607356 16L6.71042 15.9997L12.8135 15.9994L12.9715 15.9258C13.4784 15.6898 13.5737 15.0258 13.1536 14.6569C12.9004 14.4346 13.4725 14.4534 6.76546 14.448C3.28596 14.4451 0.667242 14.455 0.599229 14.4711Z"
            fill="#222222"
          />
        </svg>
      </div>
      <div class="screen__top-buttons">
        <div
          @click="screenDown($event.target.parentNode.parentNode.parentNode)"
          class="screen__top-button"
        >
          вниз
        </div>
        <div class="screen__top-arrows">
          <svg
            width="18"
            height="18"
            viewBox="0 0 18 18"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M4.17598 7.80468V13.6094L3.44662 12.8806L2.71723 12.1519L2.15062 12.7194C1.83897 13.0314 1.58398 13.3029 1.58398 13.3225C1.58398 13.3422 2.35348 14.1276 3.29398 15.068L5.00398 16.7777L6.73184 15.0501L8.45973 13.3225L7.87524 12.7372L7.2907 12.1519L6.56134 12.8806L5.83198 13.6094V7.80468V2H5.00398H4.17598V7.80468Z"
              fill="#666666"
            />
            <path
              d="M15.4155 5.68736L15.2023 5.9009L14.8267 5.52569L14.8267 5.52568L14.0974 4.79695L13.244 3.94426V5.15065V10.9553V16.26H12.916H12.588V10.9553V5.15065V3.94426L11.7346 4.79695L11.0054 5.52553L11.0053 5.52555L10.6297 5.90087L10.3983 5.66949L10.3983 5.66947L10.167 5.43825L11.5324 4.07267L11.5324 4.07266C12.0047 3.60032 12.4358 3.17117 12.7498 2.86036C12.8104 2.80035 12.8666 2.74485 12.9178 2.69436C12.9768 2.75258 13.0422 2.81722 13.1129 2.88723C13.434 3.20566 13.8596 3.63117 14.2845 4.05819C14.7094 4.48522 15.1328 4.91293 15.4496 5.23574C15.5244 5.31195 15.5931 5.38209 15.6542 5.44485C15.5823 5.51907 15.5013 5.60142 15.4155 5.68733L15.4155 5.68736Z"
              fill="#666666"
              stroke="#666666"
            />
          </svg>
        </div>
        <div
          @click="screenUp($event.target.parentNode.parentNode.parentNode)"
          class="screen__top-button"
        >
          вверх
        </div>
      </div>
    </div>

    <div class="screen__wrap">
      <div class="screen__del" @click="screenDel()">
        <svg
          width="15"
          height="15"
          viewBox="0 0 15 15"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <line
            x1="1.06066"
            y1="1"
            x2="13"
            y2="12.9393"
            stroke="#222222"
            stroke-width="1.5"
            stroke-linecap="round"
          />
          <path
            d="M1 13.293L13.2929 1.00008"
            stroke="#222222"
            stroke-width="1.5"
            stroke-linecap="round"
          />
        </svg>
      </div>
      <div
        class="screen__wrap__elements"
        v-for="(items, i) in curScreenItem"
        :key="i" :id="'item-'+i"
      >
        <div class="screen__elements">
          <Elements
            ref="elements"
            v-for="(item, key) in items.elements"
            @elementClose="elementDelete"
            :key="key"
            :elementId="i"
            :screenId="screenNumber"
            :elementNumber="key"
            :count="items.elements.length"
            :type="typeof item"
            :element="item"
          />
        </div>
        <div
          class="image__wrapper"
          :class="items.img !== 'null' ? 'loaded' : ''"
        >
          <input
            name="file_screen"
            type="file"
            :id="'input__file_screen-' + screenNumber + '-' + i"
            class="input input__file"
            @change="setImg($event.target)"
          />
          <label
            :for="'input__file_screen-' + screenNumber + '-' + i"
            class="input__file-button"
          >
            <span class="input__file-icon-wrapper">
              <svg
                width="20"
                height="20"
                viewBox="0 0 23 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M2.94753 0.40624C1.81586 0.702947 0.914068 1.6102 0.624177 2.74371C0.543194 3.06041 0.541016 3.28283 0.541016 11.2568C0.541016 19.2202 0.543279 19.4535 0.623878 19.7686C0.915007 20.907 1.82602 21.8181 2.96432 22.1092C3.27941 22.1898 3.51262 22.1921 11.4754 22.1921C19.4383 22.1921 19.6715 22.1898 19.9866 22.1092C21.1273 21.8175 22.0353 20.9094 22.327 19.7686C22.4076 19.4535 22.4099 19.2202 22.4099 11.2568C22.4099 3.29326 22.4076 3.06003 22.327 2.74491C22.0348 1.60229 21.1296 0.696625 19.9878 0.404574C19.6709 0.323542 19.4526 0.321449 11.4579 0.323755C3.57472 0.326019 3.24131 0.329266 2.94753 0.40624ZM19.3986 1.73305C20.2742 1.8591 20.8946 2.50433 21.0021 3.40047C21.0292 3.62687 21.0408 5.3846 21.0335 8.14556L21.0217 12.5311L19.6122 11.2469C18.837 10.5406 18.1066 9.90162 17.9891 9.82687C17.3681 9.43179 16.6486 9.37831 16.0161 9.68018C15.6802 9.84054 15.7909 9.72738 12.5752 13.1974C11.1834 14.6995 9.99229 15.9667 9.92835 16.0135C9.81332 16.0976 9.81059 16.0976 9.65781 16.0163C9.57294 15.9711 8.72185 15.3139 7.76654 14.5558C6.44552 13.5074 5.97333 13.1563 5.79471 13.0894C5.32658 12.914 4.74287 12.9393 4.28973 13.1545C4.16603 13.2133 3.58429 13.6333 2.99699 14.0879L1.92918 14.9144L1.91747 9.33721C1.90995 5.7775 1.92132 3.62999 1.94882 3.40047C2.00542 2.92812 2.17234 2.57157 2.48166 2.26222C2.75673 1.98708 3.14384 1.78948 3.51296 1.73561C3.88106 1.68192 19.0266 1.67948 19.3986 1.73305ZM7.40596 3.76288C6.77317 3.91619 6.10839 4.3967 5.7552 4.95598C5.25969 5.74064 5.1905 6.78599 5.57999 7.60221C5.84037 8.14778 6.31192 8.62855 6.84112 8.88805C7.30383 9.11492 7.60658 9.17511 8.18298 9.15486C8.77972 9.13393 9.16179 9.01492 9.60544 8.71172C11.56 7.37616 11.0428 4.36449 8.75854 3.78022C8.36955 3.68074 7.77636 3.67313 7.40596 3.76288ZM8.53019 5.18785C9.24439 5.45927 9.59784 6.27574 9.29056 6.94438C9.13936 7.27338 8.95155 7.47163 8.64693 7.62387C8.16774 7.86333 7.60423 7.78525 7.20205 7.42366C6.63316 6.91209 6.5828 6.1247 7.08266 5.55674C7.24843 5.36841 7.48117 5.21749 7.71673 5.14556C7.91953 5.08366 8.30928 5.10391 8.53019 5.18785ZM17.0921 10.9529C17.1908 10.9983 18.0619 11.7594 19.153 12.7535L21.0431 14.4754L21.0417 16.6571C21.041 17.8571 21.0218 18.982 20.9992 19.1569C20.8865 20.0249 20.2429 20.6686 19.3749 20.7813C18.9462 20.8369 4.00471 20.8369 3.57596 20.7813C2.708 20.6686 2.06436 20.0249 1.95173 19.1569C1.92905 18.982 1.90987 18.3647 1.90914 17.7851L1.90782 16.7313L3.32357 15.6342C4.88147 14.4269 4.95472 14.3754 5.11554 14.3752C5.25354 14.375 5.23372 14.3603 7.0974 15.8411C7.94311 16.513 8.75038 17.1314 8.89133 17.2153C9.62048 17.6492 10.3251 17.5787 10.949 17.0096C11.0823 16.888 12.1431 15.7601 13.3063 14.5032C16.2419 11.3312 16.5619 10.9952 16.7077 10.9316C16.8741 10.8589 16.8902 10.8598 17.0921 10.9529Z"
                  fill="#030087"
                />
              </svg>
            </span>
            <span class="input__file-button-text">Добавить изображение</span>
          </label>
          <div
            class="img__wrapper"
            :class="items.img !== 'null' ? 'active' : ''"
          >
            <div class="elements__del">
              <svg
                width="15"
                height="15"
                viewBox="0 0 15 15"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                @click="delImg($event.target)"
              >
                <line
                  x1="1.06066"
                  y1="1"
                  x2="13"
                  y2="12.9393"
                  stroke="#222222"
                  stroke-width="1.5"
                  stroke-linecap="round"
                ></line>
                <path
                  d="M1 13.293L13.2929 1.00008"
                  stroke="#222222"
                  stroke-width="1.5"
                  stroke-linecap="round"
                ></path>
              </svg>
            </div>
            <img :src="items.img" />
          </div>
        </div>
      </div>
      <div class="screen__columns">
        <div class="screen__column" id="1" @click="testcur($event.target)">
          <div class="screen__column-item"></div>
        </div>
        <div class="screen__column" id="2" @click="testcur($event.target)">
          <div class="screen__column-item"></div>
          <div class="screen__column-item"></div>
        </div>
        <div class="screen__column" id="3" @click="testcur($event.target)">
          <div class="screen__column-item"></div>
          <div class="screen__column-item"></div>
          <div class="screen__column-item"></div>
        </div>
        <div class="screen__column" id="4" @click="testcur($event.target)">
          <div class="screen__column-item"></div>
          <div class="screen__column-item"></div>
          <div class="screen__column-item"></div>
          <div class="screen__column-item"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Elements from "../components/Elements.vue";
import Title from "./Title.vue";
import SubTitle from "./SubTitle.vue";
import TextArea from "./TextArea.vue";
export default {
  name: "Screen",
  components: { Elements, Title, SubTitle, TextArea },
  props: ["types", "screenNumber", "screens", "title", "screenItem"],
  data: () => ({
    current: 4,
    elementswraps: [],
    elements: [],
    test: 0,
    curScreenItem: [],
    curtitle: null
  }),
  beforeMount() {
    for (const key in this.screenItem[0]) {
      if (typeof this.screenItem[0][key] == 'object') {
        this.curScreenItem[key] = this.screenItem[0][key]
      } else {
        this['cur'+key] = this.screenItem[0][key]
      }
    }
  },
  mounted() {
    for (const i in this.curScreenItem) {
      if(typeof this.curScreenItem[i] !== 'object')
        this.$el.querySelector('#item-'+i).remove()
    }
  },
  methods: {
    setTitle(id, title) {
      this.curtitle = title;
      this.$emit("setTitle", { id, title });
    },
    setImg(el) {
      var elem = el.parentNode;
      elem.classList.remove("loaded");
      if (el.files && el.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          let img = elem.querySelector("img");
          img.src = e.target.result;
          img.parentNode.classList.add("active");
          elem.classList.add("loaded");
        };
        reader.readAsDataURL(el.files[0]);
      }
    },
    delImg(el) {
      var parent = el.closest(".image__wrapper");
      var image = el.closest(".img__wrapper");
      var elem = parent.querySelector("input");
      elem.value = null;
      image.querySelector("img").src = null;
      image.classList.remove("active");
      parent.classList.remove("loaded");
    },
    screenDown(el) {
      let curIndex = this.getIndex(el);
      if (curIndex < this.screens - 1) {
        this.$emit("screenDown", {
          oldIndex: curIndex,
          newIndex: curIndex + 1,
        });
      }
      this.$emit("screenDown", false);
    },
    screenUp(el) {
      let curIndex = this.getIndex(el);
      if (curIndex !== 0) {
        this.$emit("screenUp", {
          newIndex: curIndex,
          oldIndex: curIndex - 1,
        });
      }
      this.$emit("screenUp", false);
    },
    getIndex(el) {
      let screens = document.querySelectorAll(".screen");
      var curIndex;
      for (let i = 0; i < screens.length; i++) {
        if (screens[i] == el) curIndex = i;
      }
      return curIndex;
    },
    elementDelete(curElement) {
      let items =
        curElement.element.parentNode.querySelectorAll(".elements-item");
      for (let i = 0; i < items.length; i++) {
        var count;
        var countClass;
        for (let j = 0; j < items[i].classList.length; j++) {
          if (items[i].classList[j].includes("count"))
            count = items[i].classList[j].split("count-")[1];
          countClass = items[i].classList[j];
        }
        items[i].classList.remove(countClass);
        items[i].classList.add("count-" + (count - 1));
      }
      curElement.element.remove();
    },
    screenDel() {
      this.$emit("screenClose", {});
    },
    editTitle(id) {
      document
        .querySelector("#screenElement-" + (id - 1) + " .screen__top-title")
        .classList.toggle("active");
    },
    leaveTitle(id) {
      if (
        document
        .querySelector("#screenElement-" + (id - 1) + " .screen__top-title")
          .classList.contains("active")
      ) {
        document
        .querySelector("#screenElement-" + (id - 1) + " .screen__top-title")
          .classList.remove("active");
      }
    },
    testcur(e) {
      if (e.id !== "") {
        this.current = e.id;
      } else {
        this.current = e.parentNode.id;
      }
      let arr = [];
      for (let index = 0; index < this.current; index++) {
        arr.push(index);
      }
      this.elements[this.current - 1] = [];
      this.curScreenItem.push({
        count: this.current,
        elements: [],
        img: null
      });
      for (let i = 0; i < arr.length; i++) {
        this.curScreenItem[
          Object.values(this.curScreenItem).length - 1
        ].elements.push(this.elements[this.current - 1]);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.screen {
  margin-top: 30px;

  &__top {
    display: flex;
    align-items: center;
    justify-content: space-between;

    &-title {
      display: flex;
      align-items: center;
      font-size: 14px;
      line-height: 18px;
      color: #222222;
      font-weight: 600;
      margin-right: 10px;

      & svg {
        margin-left: 10px;
      }
    }

    &-buttons {
      display: flex;
      align-items: center;
    }

    &-button {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 41px;
      padding: 3px 0 2px;
      border: 1px solid rgba(3, 0, 135, 0.3);
      border-radius: 3px;
      font-size: 8px;
      line-height: 10px;
      font-weight: 700;
      text-transform: uppercase;
      color: #222222;
      cursor: pointer;
    }

    &-arrows {
      display: flex;
      margin: 0 5px;
      cursor: pointer;
    }
  }

  &__wrap {
    background: #fff;
    padding: 30px 30px 10px;
    border-radius: 7px;
    margin-top: 10px;
    position: relative;
  }

  &__del {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 2;
    cursor: pointer;
  }

  &__columns {
    display: flex;
    justify-content: space-between;
    padding: 20px 25px;
    border: 2px dashed rgba(3, 0, 135, 0.3);
    border-radius: 5px;
  }

  &__column {
    max-width: 250px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    position: relative;
    margin-right: 10px;

    &-item {
      width: 100%;
      height: 40px;
      background: #f3f6fd;
      border-radius: 5px;
      cursor: pointer;
    }

    &:nth-child(2) {
      & .screen__column-item {
        width: 49%;
      }
    }

    &:nth-child(3) {
      & .screen__column-item {
        width: 32%;
      }
    }

    &:nth-child(4) {
      & .screen__column-item {
        width: 24%;
      }
    }

    &::after {
      position: absolute;
      width: 20px;
      height: 20px;
      content: "";
      background: url(../assets/images/secreen-column-icon.svg);
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0;
      visibility: hidden;
      transition: ease-in-out 0.25s;
    }

    &:hover {
      &::after {
        opacity: 1;
        visibility: visible;
      }
    }
  }

  &__elements {
    display: flex;
    justify-content: space-between;
    // height: 75px;
    // margin-bottom: 20px;
  }
}
.image__wrapper {
  padding-top: 30px;
}
.img__wrapper.active {
  display: flex;
  align-items: center;
  justify-content: center;
  width: fit-content;
  margin: 20px auto 0;
  padding: 35px;
}
.screen__top-title input {
  display: none;
}
.screen__top-title.active input {
  display: block;
}
.screen__top-title.active span {
  display: none;
}
.screen__top input {
  background: transparent;
  outline: none;
  border: 1px solid rgba(3, 0, 135, 0.3);
  border-radius: 5px;
  padding: 10px;
}

@media (max-width: 1170px) {
  .screen__elements {
    flex-direction: column;
  }
}

.screen__wrap__elements {
  border-bottom: 1px solid;
  margin-bottom: 30px;
}

.image__wrapper {
  border-top: 1px solid;
}
</style>
