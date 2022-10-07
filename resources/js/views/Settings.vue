<template>
  <section class="page-glob" id="Settings">
    <MenuReports />
    <form class="settings wrap-glob" method="POST" enctype="multipart/form-data" action="/settings">
      <div class="settings-top">
        <h2>Настройки</h2>
        <button class="settings-top__button">
          <svg
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
          >
            <mask
              id="mask0_134_2058"
              style="mask-type: alpha"
              maskUnits="userSpaceOnUse"
              x="0"
              y="0"
              width="20"
              height="20"
            >
              <rect width="20" height="20" fill="url(#pattern0)" />
            </mask>
            <g mask="url(#mask0_134_2058)">
              <rect width="20" height="20" fill="#030087" />
            </g>
            <defs>
              <pattern
                id="pattern0"
                patternContentUnits="objectBoundingBox"
                width="1"
                height="1"
              >
                <use
                  xlink:href="#image0_134_2058"
                  transform="scale(0.00195312)"
                />
              </pattern>
              <image
                id="image0_134_2058"
                width="512"
                height="512"
                xlink:href="data:image/png;base64,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yEyGnv92zlUFK3tVlj3535LkiiRXJrkq0+M+b0pyd2FN0N1xSU5O8pQkz0pyfpKXJjmpsKaH8sgkP57ksupCmMf+4te2+FTqx/JQr2uTvCnJo9b31oEZPSrJJUn2pv7z41CvT67vrW9c9ViWaz8AM9id6fex1WN58OuOJD8bq0QwquOS/FySb6f+8+Tg191JHr3G971J1WNZrv0AzOCi1I/jwa+98WsE2BbPS/K11H+uHPx66Vrf8eZUj+NK/ApgGV5cXcBB/jjTg4iuqS4EmMUfJnlupnuMLMX51QUwj6ET0EJclfpx3J/pm/+pa36vQI0nZfqlUfXnzP5MXzS2QfU4lms/ACvanenOWNXjeEcs+8O2e16mn+JVf97cm+X+UuFIVI/jSpwCqHdmlnEvg38ey/6w7f4wyb+pLiLT3HNmdRHdCQD1lvA/wd4k76guAtiIX07yl9VFZBmffa0JAPXOqC4gyaXZvsd0Aod2W5J/WV1ElvHZ15oAUO+s4v3fkuQ3imsANuu9SW4trsEKQDEBoN4Ti/d/RaYLAIE+bk/y0eIanlS8//YEgHrVV8JeWbx/oEb1//vbcjfAYQkA9aoDwFXF+wdqVN8Y6MTi/bcnANSr/p/gq8X7B2pcX7x/KwDFBIB61SsAtxTvH6hxc/H+q7/8tDfHDWiq78a3hJvorML4AVV8/qxm6PGzAgAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADc0RAO6aYRur2FW8fwD6eUTx/r+z6gbmCAC3zrCNVTy6eP8A9LO7eP+3rbqBOQLAykWs6LTi/QPQz/cX7/+WVTewDSsAzyrePwD9PLN4/4tYAagOAOcX7x+Afi4o3v8iVgD+YoZtrOJlSU4orgGAPk5I8pLiGv7vqhuYIwDsmWEbqzgxyauLawCgj5/MNPdUunbVDcwRAFYuYgY/n+S46iIA2Hq7kry1uogIAH/tqUn+SXURAGy9f5r6XwAky5h78+gk+5LsL359O8nz1vxe16F63IC+fP4cmRckuTP143ZvkpPW/F4P21WpH5D9SW5I8uQ1v9e5VY8Z0JfPn8P3fZkuvKses/1JPj/HG5rrWQBXzrSdVf3NJL+X5EnVhQCwNZ6c5GNJnlhdyAGzzLlzBYBPzrSdOfxgpnR0XnUhAAzv+Uk+k+QZ1YUcZClfupNM90S+O/XLIge/7kzyL7L8ewRUjxPQl8+fB7cryS9kGef8D37dnQWd/7/Pf0v9wBzqdUOSf5DlBoHq8QH68vnzQCckeUuS61I/Pod6zfbtf8dcG0ryU0n+04zbm9ttSa7IdLriC0m+muSm1D/OuPp/gjl7ABhL98+fXUlOzvRQubOTvDjJham/yc9DuSTJu+fY0JyDvzvTt+3jZ9wmADC5M8kTMn15XdlcFwEmyc1JPjLj9gCA7/pQZpr8k3kDQJK8Z+btAQCT9865sbnPv+xIcnWSp8+8XQDo7MuZfoq4b64Nzr0CsD/J22beJgB0968y4+SfrOcKzGOTfCXTA3oAgNX8SZKzMj0DYDZzrwAkU4GXrmG7ANDRv87Mk3+yvt9gHpvks0metabtA0AHn0/y3KwhAKxjBSCZCv3pzHy+AgAa2ZfkH2YNk3+yvgCQTA9P+LU1bh8AttllSf5gXRtf920YT0myJ8nj1rwfANgmN2a68O8b69rBOlcAkukNXJz6+00DwCj2J3lz1jj5J9PFeuv2vzM9J+D5G9gXAIzu3yf51XXvZFNPYjou0+OChQAAeHCfSfLD2cCTajf5KManZHpjp25wnwAwiq8nOTfJn21iZ+u+BuBgf5rpOcu3bnCfADCCW5O8JBua/JPNBoBkujnQK5J8Z8P7BYCluivJ38t005+N2cRFgPf31Uz3NX5lNnsKAgCWZl+S1yb58KZ3XBEAkuSaA6+XJ9lZVAMAVLoryeuSvL9i59XfwM9P8jtJHl1cBwBs0m2Zlv1/v6qA6gCQJM9J8tEkj68uBAA24K+SvDTJ5yqL2PRFgIfyuSTnJPmf1YUAwJr9r0z3xCmd/JO6awDu75Yk7810+8PzsoyVCQCYy/5Md/d7TdZ8i9/DtcSJ9qIk744HCAGwHW5M8qYkH6ku5GBLWQE42LVJ3pXk+Ex3RFpiSAGAh7M/yfsy/eLtj4treYClT67PSfLOTEEAAEbxhSQ/kwVf37aEiwAfyucyXSxxSaanCgLAku1N8sYMcHH70lcADnZMpp9N/GKSZ9eWAgDf45okb09yeZJ7ims5LCMFgPvsSPKjSS7OdMHg8bXlANDUt5P8bqZfsX0s0zn/YYwYAA62O9OdlF6b5IfitsIArNc9Sf57kv+c5LeT3FxbztEbPQAc7IRM1wv8yIHX2Vn+NQ4ALN/1ST5x4PXxJDfVljOPbQoA93dSkjOTnJHkrAP/flKSEw+8Tj7wd1dVgQCUuivTPflvOvD3tiR/nulCvj2Zfpa+N8mtVQUCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJv1/wH2+CVbghmaVAAAAABJRU5ErkJggg=="
              />
            </defs>
          </svg>
          Сохранить
        </button>
      </div>
      <div class="settings-form">
        <input type="hidden" name="_token" :value="csrf">
        <div class="input-group">
          <label class="settings__label" for="logo-company"
            >Логотип компании</label
          >
          <div class="input-file">
            <input type="file" id="logo-company" name="company" :required="settings.company ? false : true" @change="changeUserAvatar($event.target)" />
            <label for="logo-company">
              <div class="input-file__image input-file__image--settings">
                <img
                  src="../assets/images/inpit-file-image-clientlogo.png"
                  alt=""
                />
              </div>
              <div class="input-file__text">Название изображения.jpg</div>
            </label>

            <img :src="settings.company" v-if="settings.company">
          </div>
        </div>
        <div class="input-group settings__field--address">
          <label class="settings__label" for="address">Адрес компании</label>
          <input
            class="settings__input"
            type="text" name="address"
            id="address" required :value="settings.address ?? null"
            placeholder="г. Ростов-на-Дону, ул. Красноармейская, 153"
          />
        </div>
        <div class="input-group settings__field--companyPhone">
          <label class="settings__label" for="companyPhone"
            >Номер телефона компании</label
          >
          <input
            v-maska="'+7 (###) ###-##-##'"
            class="settings__input"
            type="text" :value="settings.company_phone ?? null"
            id="companyPhone"
            name="company_phone"
            placeholder="+7 (928) 132-45-67"
          />
        </div>
        <div class="input-group settings__field--companyMail">
          <label class="settings__label" for="companyMail"
            >E-mail адрес компании
          </label>
          <input
            class="settings__input"
            type="email"
            id="companyMail" :value="settings.company_email ?? null"
            name="company_email"
            placeholder="seo@umax.agency"
          />
        </div>
        <div class="input-group settings__field--name">
          <label class="settings__label" for="name">Имя менеджера</label>
          <input
            class="settings__input"
            type="text"
            id="name" :value="settings.name ?? null"
            name="name"
            placeholder="Имя Фамилия"
          />
        </div>
        <div class="input-group settings__field--mail">
          <label class="settings__label" for="mail">E-mail менеджера</label>
          <input
            class="settings__input"
            type="email"
            id="mail"
            :value="settings.email ?? null"
            name="email"
            placeholder="seo@umax.agency"
          />
        </div>
        <div class="input-group settings__field--phone">
          <label class="settings__label" for="phone">Телефон менеджера</label>
          <input
            v-maska="'+7 (###) ###-##-##'"
            class="settings__input"
            type="text"
            :value="settings.phone ?? null"
            id="phone"
            name="phone"
            placeholder="+7 (928) 132-45-67"
          />
        </div>
        <div class="input-group settings__field--slogan">
          <label class="settings__label" for="slogan">Слоган</label>
          <input
            class="settings__input"
            type="text"
            :value="settings.quote ?? null"
            id="slogan"
            name="quote"
            placeholder="Текст"
          />
        </div>
        <div class="input-group">
          <label class="settings__label" for="logo-client"
            >Логотип клиента</label
          >
          <div class="input-file">
            <input type="file" id="logo-client" name="logo" :required="settings.logo ? false : true" @change="changeUserAvatar($event.target)" />
            <label for="logo-client">
              <div class="input-file__image input-file__image--settings">
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
      </div>
    </form>
  </section>
</template>
<script>
import MenuReports from "../components/MenuReports.vue";
export default {
  name: "Settings",
  components: {
    MenuReports,
  },
  data: () => ({
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    user: document.querySelector('meta[name="user"]').getAttribute('value'),
    settings: [],
  }),
  methods: {
    changeUserAvatar(el) {
      el.closest('.input-file').querySelector(".input-file__text").textContent =
        el.files[0].name;
    },
  },
  beforeMount() {
    axios.get('/api/getSettings/' + this.user).then(result => {
      this.settings = result.data;
    })
    document.querySelector('title').textContent = 'Настройки'
  }
};
</script>
<style lang="scss" scoped>
.settings {
  &-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    &__button {
      display: flex;
      align-items: center;
      justify-content: center;

      width: 200px;
      padding: 13px 5px;
      background-color: #ffffff;
      border: 1px solid #030087;
      border-radius: 5px;
      cursor: pointer;

      font-weight: 600;
      font-size: 16px;
      line-height: 20px;
      color: #030087;
      transition: ease-in-out 0.25s;
      & svg {
        margin-right: 15px;
        & g {
          & rect {
            transition: ease-in-out 0.25s;
          }
        }
      }
      &:hover {
        color: #ffffff;
        background-color: #030087;
        & svg {
          margin-right: 15px;
          & g {
            & rect {
              fill: #ffffff;
            }
          }
        }
      }
    }
  }
  & .input-file {
    margin-top: 10px;
    margin-bottom: 0;
  }
  & .input-group {
    margin-bottom: 20px;
  }
  &__field {
    &--companyPhone,
    &--phone {
      & the-mask {
        background-color: #ffffff;
      }
    }
  }
}

.input-file > img {
  max-width: 200px;
  margin-top: 20px;
}

.input-file input {
  height: 0;
  border: none;
  position: absolute;
  display: block;
}
</style>
