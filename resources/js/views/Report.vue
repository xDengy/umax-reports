<template>
  <section class="page-glob" id="Newreport">
    <MenuReports />
    <div class="newreport wrap-glob" v-if="Object.values(this.report).length > 0">
      <h2>{{report.title}}</h2>
      <form class="newreport-form" method="post" enctype="multipart/form-data" action="/report">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="id" :value="curId">
        <div class="input-group newreport__field--heading">
          <label class="newreport__label" for="heading">Заголовок</label>
          <input
            class="newreport__input"
            type="text"
            id="heading"
            name="title"
            placeholder="Заголовок"
            :value="report.title"
          />
        </div>
        <div class="input-group newreport__field--Link">
          <label class="newreport__label" for="Link">Ссылка</label>
          <input
            class="newreport__input"
            type="text"
            id="Link"
            name="link"
            placeholder="https://ssylka.ru"
            :value="report.link"
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
              :value="report.dateStart"
            />
            <div class=""></div>
            <input
              class="newreport__input"
              type="date"
              id="dates"
              name="dateEnd"
              min="2000-01-01"
              max="2099-12-31"
              :value="report.dateEnd"
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
                :value="inputcolor.value"
                :checked="report.color == inputcolor.value ?? false"
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
            <input type="file" id="logo-client" name="logo" @change="changeUserAvatar()" />
            <label for="logo-client">
              <div class="input-file__image input-file__image--newreport">
                <img
                  src="../assets/images/inpit-file-image-clientlogo.png"
                  alt=""
                />
              </div>
              <div class="input-file__text">Название изображения.jpg</div>
            </label>
            <img :src="report.logo">
            <input type="hidden" name="hideLogo" :value="report.logo">
          </div>
        </div>
        <div class="input-group newreport__field--name">
          <label class="newreport__label" for="name">Имя менеджера</label>
          <input
            class="newreport__input"
            type="text"
            id="name"
            name="name"
            :value="report.name"
            placeholder="Имя Фамилия"
          />
        </div>
        <div class="input-group newreport__field--mail">
          <label class="newreport__label" for="mail">E-mail менеджера</label>
          <input
            class="newreport__input"
            type="text"
            name="email"
            :value="report.email"
            id="mail"
            placeholder="seo@umax.agency"
          />
        </div>
        <div class="input-group newreport__field--phone">
          <label class="newreport__label" for="phone">Телефон менеджера</label>
          <input
            class="newreport__input"
            type="text"
            id="phone"
            :value="report.phone"
            name="phone"
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
            :value="report.quote"
            name="quote"
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
            <img :src="report.photo">
            <input type="hidden" name="hidePhoto" :value="report.photo">
          </div>
        </div>
        <div class="newreport-buttons">
          <button class="newreport-buttons__newreports">
            Сохранить
          </button>
          <router-link class="newreport-buttons__newreports" :to="'/reports/' + this.id[this.id.length - 1]">
            Слайды
          </router-link>
          <div class="newreport-buttons__cancel">Отменить</div>
        </div>
      </form>
    </div>
    <ErrorPage v-else />
  </section>
</template>
<script>
import MenuReports from "../components/MenuReports.vue";
import ErrorPage from "./ErrorPage.vue";
export default {
  name: "Newreport",
  components: {
    MenuReports,
    ErrorPage
  },
  data: () => ({
    user: document.querySelector('meta[name="user"]').getAttribute('value'),
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    id: window.location.href.split('/'),
    curId: null,
    inputcolors: [
      {
        id: "color1",
        color: "#37BEFF",
        value: 'lightBlue'
      },
      {
        id: "color2",
        color: "#3757FF",
        value: 'blue'
      },
      {
        id: "color3",
        color: "#37FFFF",
        value: 'cyan'
      },
      {
        id: "color4",
        color: "#8F37FF",
        value: 'purple'
      },
      {
        id: "color5",
        color: "#FF37A3",
        value: 'pink'
      },
      {
        id: "color6",
        color: "#FFD337",
        value: 'orange'
      },
      {
        id: "color7",
        color: "#FF3737",
        value: 'red'
      },
      {
        id: "color9",
        color: "#6BFF37",
        value: 'green'
      },
    ],
    report: [],
  }),
  methods: {
    changeUserAvatar() {
      document.querySelector(".input-file__text").textContent =
        document.querySelector(".input-file input").files[0].name;
    },
    changeUserAvatar2() {
      document.querySelector(".input-file__text2").textContent =
        document.querySelector(".input-file2 input").files[0].name;
    },
  },
  beforeMount() {
    let id = this.id[this.id.length - 1]
    axios.post('/api/getReport',
    {
      id: id,
      user: this.user
    }).then(result => {
      if(result.data) {
        this.report = result.data;
        this.curId = this.report.id
        document.querySelector('title').textContent = this.report.title
      }
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

@media(max-width: 700px) {
 .newreport {
  padding: 100px 30px 30px 30px;
 }
}

@media(max-width: 650px) {
 .input-group-wrap--color {
  display: flex;
  flex-wrap: wrap;
 }

 .newreport-buttons {
  display: flex;
  flex-direction: column;
 }
 
 .newreport-buttons__newreports {
  margin-right: 0;
  width: 100%;
  margin-bottom: 10px;
 }

 .newreport-buttons__cancel {
  width: 100%;
 }
}
</style>
