<template>
  <section class="page-glob" id="Newreport">
    <MenuReports />
    <div class="newreport wrap-glob">
      <h2>Новый отчёт</h2>
      <form class="newreport-form" method="post" enctype="multipart/form-data" action="/newReport">
        <input type="hidden" name="_token" :value="csrf">
        <div class="input-group newreport__field--heading">
          <label class="newreport__label" for="heading">Заголовок</label>
          <input
            class="newreport__input"
            type="text"
            id="heading"
            name="title"
            required
            placeholder="Заголовок"
          />
        </div>
        <div class="input-group newreport__field--Link">
          <label class="newreport__label" for="Link">Ссылка</label>
          <input
            class="newreport__input"
            type="text"
            id="Link"
            name="link"
            required
            placeholder="https://ssylka.ru"
          />
        </div>
        <div class="input-group newreport__field--dates">
          <label class="newreport__label" for="dates"
            >Даты проведения отчета</label
          >
          <div class="input-group-wrap input-group-wrap--dates">
            <input
              class="newreport__input"
              type="date"
              id="dates"
              name="dateStart"
              min="2000-01-01"
              max="2099-12-31"
              required
              :value="firstDay"
            />
            <div class=""></div>
            <input
              class="newreport__input"
              type="date"
              id="dates"
              name="dateEnd"
              min="2000-01-01"
              max="2099-12-31"
              required
              :value="lastDay"
            />
          </div>
        </div>
        <div class="input-group newreport__field--color">
          <label class="newreport__label" for="colorNewreport"
            >Цветовая гамма</label
          >
          <div class="input-group-wrap input-group-wrap--color">
            <div
              class="newreport__input newreport__input--color"
              v-for="(inputcolor, i) in inputcolors"
              :key="i"
            >
              <input
                type="radio"
                :id="inputcolor.id"
                name="color"
                :value="inputcolor.color"
                checked
              />
              <label
                :for="inputcolor.id"
                :style="{
                  background: inputcolor.color,
                }"
              ></label>
            </div>
          </div>
        </div>
        <div class="input-group">
          <label class="newreport__label" for="logo-client"
            >Логотип клиента</label
          >
          <div class="input-file">
            <input type="file" id="logo-client" name="logo"
            :required="settings.logo ? false : true" @change="changeUserAvatar()" />
            <label for="logo-client">
              <div class="input-file__image input-file__image--newreport">
                <img
                  src="../assets/images/inpit-file-image-clientlogo.png"
                  alt=""
                />
              </div>
              <div class="input-file__text">Название изображения.jpg</div>
            </label>

            <img :src="settings.logo" v-if="settings.logo">
          </div>
        </div>
        <div class="input-group newreport__field--name">
          <label class="newreport__label" for="name">Имя менеджера</label>
          <input
            class="newreport__input"
            type="text"
            id="name"
            name="name"
            required
            :value="settings.name ?? null"
            placeholder="Имя Фамилия"
          />
        </div>
        <div class="input-group newreport__field--mail">
          <label class="newreport__label" for="mail">E-mail менеджера</label>
          <input
            class="newreport__input"
            type="text"
            name="email"
            id="mail"
            :value="settings.email ?? null"
            required
            placeholder="seo@umax.agency"
          />
        </div>
        <div class="input-group newreport__field--phone">
          <label class="newreport__label" for="phone">Телефон менеджера</label>
          <input
            class="newreport__input"
            type="text"
            id="phone"
            name="phone"
            :value="settings.phone ?? null"
            required
            v-maska="'+7 (###) ###-##-##'"
            placeholder="+7 (928) 132-45-67"
          />
        </div>
        <div class="input-group newreport__field--slogan">
          <label class="newreport__label" for="slogan">Слоган</label>
          <input
            class="newreport__input"
            type="text"
            id="slogan"
            name="quote"
            :value="settings.quote ?? null"
            required
            placeholder="Текст"
          />
        </div>
        <div class="input-group">
          <label class="newreport__label" for="photo-menedger"
            >Фото менеджера</label
          >
          <div class="input-file input-file2">
            <input
              type="file" name="photo"
              id="photo-menedger"
              @change="changeUserAvatar2()"
            />
            <label for="photo-menedger">
              <div class="input-file__image input-file__image--newreport">
                <img
                  class="input-file__images"
                  src="../assets/images/inpit-file-image-clientlogo.png"
                  alt=""
                />
              </div>
              <div class="input-file__text input-file__text2">
                Название изображения.jpg
              </div>
            </label>
          </div>
        </div>
        <div class="newreport-buttons">
          <button class="newreport-buttons__newreports">
            <svg
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M9.00209 0.00914834C6.37427 0.291714 3.99488 1.55089 2.32055 3.54509C1.14391 4.94649 0.412797 6.53547 0.0881988 8.39685C0.0137612 8.82382 0.00268555 9.03144 0.00268555 10.0026C0.00268555 10.9738 0.0137612 11.1814 0.0881988 11.6084C0.456473 13.7202 1.33798 15.4686 2.79825 16.9836C4.29901 18.5405 6.18774 19.5297 8.3943 19.9145C8.82128 19.9889 9.0289 20 10.0001 20C11.2266 20 11.5944 19.9584 12.554 19.7109C16.0051 18.8211 18.8185 16.0079 19.7082 12.5571C19.9558 11.5969 19.9974 11.2293 19.9974 10.0026C19.9974 9.03144 19.9864 8.82382 19.9119 8.39685C19.5275 6.19201 18.5367 4.30039 16.981 2.80079C15.4714 1.34562 13.7077 0.454522 11.6264 0.0953661C11.2499 0.0303995 10.9531 0.0117705 10.1566 0.00316046C9.60773 -0.00278829 9.08819 -8.78735e-05 9.00209 0.00914834ZM11.2133 1.6465C13.1148 1.95365 14.6134 2.71458 15.9508 4.05191C17.1143 5.21552 17.8841 6.58921 18.2325 8.12406C18.5068 9.33276 18.5068 10.6725 18.2325 11.8812C17.7599 13.9633 16.4596 15.8194 14.5909 17.0794C13.8706 17.5651 12.7769 18.0311 11.8786 18.235C10.6699 18.5094 9.33021 18.5094 8.12152 18.235C6.03941 17.7624 4.18333 16.4621 2.92325 14.5934C2.43756 13.8731 1.97157 12.7795 1.76766 11.8812C1.49332 10.6725 1.49332 9.33276 1.76766 8.12406C2.11606 6.58921 2.88579 5.21552 4.04936 4.05191C5.52618 2.57513 7.21191 1.79295 9.39345 1.57238C9.70345 1.54103 10.8493 1.58768 11.2133 1.6465ZM9.64862 5.35516C9.55383 5.40361 9.42241 5.51088 9.35659 5.59358L9.23691 5.74394L9.22591 7.44278L9.21495 9.14161H7.58069C5.9631 9.14161 5.9447 9.14251 5.77411 9.22967C5.67932 9.27812 5.54841 9.38477 5.48321 9.46668C5.38321 9.59243 5.36251 9.65653 5.35077 9.87761C5.33245 10.2212 5.44117 10.4399 5.7145 10.6092L5.904 10.7266L7.56069 10.7387L9.21734 10.7508V12.3861V14.0213L9.30845 14.1939C9.59168 14.7302 10.4085 14.7302 10.6917 14.1939L10.7828 14.0213V12.3861V10.7508L12.4394 10.7387L14.0961 10.7266L14.2856 10.6092C14.559 10.4399 14.6677 10.2212 14.6494 9.87761C14.6376 9.65653 14.6169 9.59243 14.5169 9.46668C14.4517 9.38477 14.3208 9.27812 14.226 9.22967C14.0554 9.14251 14.037 9.14161 12.4194 9.14161H10.7852L10.7742 7.44278L10.7632 5.74394L10.6435 5.59358C10.4879 5.39797 10.2299 5.2671 10.0001 5.2671C9.8915 5.2671 9.75312 5.30177 9.64862 5.35516Z"
                fill="#fff"
              />
            </svg>
            Создать отчёт
          </button>
          <div class="newreport-buttons__cancel">Отменить</div>
        </div>
      </form>
    </div>
  </section>
</template>
<script>
import MenuReports from "../components/MenuReports.vue";
export default {
  name: "Newreport",
  components: {
    MenuReports,
  },
  data: () => ({
    firstDay: '2022-06-10',
    lastDay: '2022-06-10',
    user: document.querySelector('meta[name="user"]').getAttribute('value'),
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    settings: [],
    inputcolors: [
      {
        id: "color1",
        color: "#37BEFF",
      },
      {
        id: "color2",
        color: "#3757FF",
      },
      {
        id: "color3",
        color: "#37FFFF",
      },
      {
        id: "color4",
        color: "#8F37FF",
      },
      {
        id: "color5",
        color: "#FF37A3",
      },
      {
        id: "color6",
        color: "#FFD337",
      },
      {
        id: "color7",
        color: "#FF3737",
      },
      {
        id: "color8",
        color: "#CBFF37",
      },
      {
        id: "color9",
        color: "#6BFF37",
      },
    ],
  }),
  methods: {
    changeUserAvatar() {
      document.querySelector(".input-file__text").textContent =
        document.querySelector(".input-file input").files[0].name;
      // document.querySelector(".input-file__images").textContent =
      // document.querySelector(".input-file input").files[0].value.getAsDataURL();
      // console.log(document.querySelector(".input-file input").value);
    },
    changeUserAvatar2() {
      document.querySelector(".input-file__text2").textContent =
        document.querySelector(".input-file2 input").files[0].name;
    },
  },
  beforeMount() {
    const now = new Date();
    this.firstDay = new Date(now.getFullYear(), now.getMonth(), 1)
    this.lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0)

    this.firstDay = new Intl.DateTimeFormat('fr-CA', {  year: 'numeric', month: '2-digit', day: '2-digit' }).format(this.firstDay);
    this.lastDay = new Intl.DateTimeFormat('fr-CA', {  year: 'numeric', month: '2-digit', day: '2-digit' }).format(this.lastDay);

    axios.get('/api/getSettings/' + this.user).then(res => {
      this.settings = res.data;
    })
  }
};
</script>
<style lang="scss" scoped>
.newreport {
  & .input-file {
    margin-top: 10px;
    margin-bottom: 0;
  }
  & .input-group {
    margin-bottom: 20px;
    &-wrap {
      display: flex;
      align-items: center;
      &--dates {
        & div {
          height: 2px;
          width: 15px;
          margin: 0 10px;
          background: #000;
        }
      }
      &--color {
        margin-top: 10px;
      }
    }
  }
  &__input {
    &--color {
      & input {
        display: none;

        &:checked + label::before {
          opacity: 1;
          visibility: visible;
        }
      }
      & label {
        align-items: center;
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: 1px solid rgba(3, 0, 135, 0.3);
        margin-right: 10px;
        position: relative;
        cursor: pointer;

        &::before {
          width: 46px;
          height: 46px;
          position: absolute;
          top: 0px;
          bottom: 0;
          left: 0;
          right: 0;
          margin: auto;
          border-radius: 3px;
          z-index: 2;
          content: url(../assets/images/check-icon.svg);
          opacity: 0;
          visibility: hidden;
          transition: ease-in-out 0.25s;
        }
      }
    }
  }
  &__field {
    &--dates {
      & input {
        max-width: 195px;
      }
    }
    &--phone {
      & the-mask {
        background-color: #ffffff;
      }
    }
  }
  &-buttons {
    display: flex;
    &__newreports {
      width: 224px;
      padding: 12px 0;
      display: flex;
      align-content: center;
      justify-content: center;
      color: #fff;
      background-color: #030087;
      border: 1.5px solid #030087;
      border-radius: 7px;
      transition: ease-in-out 0.25s;

      margin-right: 30px;
      & svg {
        margin-right: 10px;

        & path {
          transition: ease-in-out 0.25s;
        }
      }
      &:hover {
        color: #030087;
        background-color: #ffffff;
        & svg {
          & path {
            fill: #030087;
          }
        }
      }
    }
    &__cancel {
      width: 157px;
      padding: 12px 0;

      text-align: center;
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;

      color: #030087;

      background-color: #ffffff;
      border: 1px solid #030087;
      border-radius: 5px;
      transition: ease-in-out 0.25s;
      &:hover {
        background-color: #030087;
        color: #ffffff;
      }
    }
  }
}

.input-file > img {
  max-width: 200px;
  margin-top: 20px;
}
</style>
