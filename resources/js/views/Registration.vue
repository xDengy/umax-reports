<template>
  <div class="autorization">
    <div class="autorization__wrap">
      <div class="autorization__logo">
        <img src="../assets/images/logotip.svg" alt="" />
      </div>
      <form
        class="autorization__form"
        method="POST"
        @submit.prevent="registration"
        enctype="multipart/form-data"
        action="/register"
      >
        <input type="hidden" name="_token" :value="csrf" />
        <div class="input-group">
          <label for="">Логин</label>
          <input
            type="text"
            placeholder="admin"
            name="login"
            required
            v-model="login"
            @input="input"
          />
        </div>
        <div class="input-group">
          <label for="">Имя Фамилия</label>
          <input
            type="text"
            placeholder="Иван Иванов"
            name="name"
            required
            v-model="username"
          />
        </div>
        <div class="input-group">
          <label for="">Должность</label>
          <input
            type="text"
            placeholder="Менеджер"
            name="post"
            required
            v-model="post"
          />
        </div>
        <div class="input-group">
          <label for="">E-mail</label>
          <input
            type="email"
            placeholder="info@mail.ru"
            name="email"
            required
            v-model="email"
          />
        </div>
        <div
          class="input-group input-group--password"
          :class="[pass === true ? 'active' : '']"
        >
          <label for="">
            <span class="element__label">
              <svg
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M10 18.75C7.67936 18.75 5.45376 17.8281 3.81282 16.1872C2.17187 14.5462 1.25 12.3206 1.25 10C1.25 7.67936 2.17187 5.45376 3.81282 3.81282C5.45376 2.17187 7.67936 1.25 10 1.25C12.3206 1.25 14.5462 2.17187 16.1872 3.81282C17.8281 5.45376 18.75 7.67936 18.75 10C18.75 12.3206 17.8281 14.5462 16.1872 16.1872C14.5462 17.8281 12.3206 18.75 10 18.75ZM10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 7.34784 18.9464 4.8043 17.0711 2.92893C15.1957 1.05357 12.6522 0 10 0C7.34784 0 4.8043 1.05357 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C4.8043 18.9464 7.34784 20 10 20V20Z"
                  fill="#9B9B9B"
                ></path>
                <path
                  d="M7.27292 7.65832C7.27154 7.69267 7.27682 7.72694 7.28844 7.75905C7.30006 7.79115 7.31776 7.82041 7.34046 7.84501C7.36317 7.86961 7.39039 7.88904 7.42046 7.90211C7.45053 7.91518 7.48281 7.9216 7.51531 7.92099H8.34508C8.48387 7.92099 8.59451 7.80082 8.61261 7.65513C8.70313 6.95751 9.15573 6.44919 9.96237 6.44919C10.6523 6.44919 11.284 6.81395 11.284 7.69129C11.284 8.36658 10.9078 8.6771 10.3134 9.14927C9.6365 9.66929 9.10042 10.2765 9.13864 11.2623L9.14165 11.4931C9.14271 11.5629 9.16967 11.6294 9.21671 11.6783C9.26375 11.7273 9.3271 11.7547 9.3931 11.7547H10.2088C10.2755 11.7547 10.3394 11.7267 10.3866 11.6768C10.4337 11.627 10.4602 11.5594 10.4602 11.4888V11.3772C10.4602 10.6136 10.7348 10.3914 11.4761 9.7969C12.0886 9.30453 12.7272 8.75792 12.7272 7.61047C12.7272 6.00361 11.4439 5.22729 10.0388 5.22729C8.76449 5.22729 7.36847 5.85473 7.27292 7.65832V7.65832ZM8.83891 13.7869C8.83891 14.3538 9.26637 14.7727 9.85475 14.7727C10.4673 14.7727 10.8887 14.3538 10.8887 13.7869C10.8887 13.1999 10.4663 12.7873 9.85374 12.7873C9.26637 12.7873 8.83891 13.1999 8.83891 13.7869Z"
                  fill="#9B9B9B"
                ></path>
              </svg>
              <div class="element__popup">
                Пароль должен содержать цифры и буквы
              </div>
            </span>
            Пароль</label
          >
          <input
            type="password"
            placeholder="password"
            name="password"
            required
            v-model="password"
            @input="input"
          />
          <div class="input-group__pass-icon" @click="showPass()">
            <svg
              width="24"
              height="20"
              viewBox="0 0 24 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M11.8286 0.103348C11.554 0.243626 11.3804 0.474713 11.3233 0.776076C11.2975 0.911899 11.2764 1.60649 11.2764 2.31959C11.2764 3.0327 11.2975 3.72729 11.3233 3.86311C11.4767 4.67217 12.478 4.9073 12.9963 4.25597L13.1367 4.07945V2.31959V0.559734L12.9963 0.383215C12.8135 0.153598 12.5108 0 12.241 0C12.1136 0 11.9512 0.0406962 11.8286 0.103348ZM1.01489 4.927C0.916224 4.98345 0.772179 5.1083 0.694737 5.20443C0.575175 5.35289 0.551427 5.42569 0.537556 5.68673C0.52396 5.9417 0.539439 6.02764 0.628043 6.18996C0.768964 6.4481 2.85738 8.33731 3.14175 8.4639C3.70759 8.7157 4.37123 8.31696 4.4229 7.69412C4.46337 7.20604 4.42226 7.1517 3.13265 5.9891C2.49704 5.41605 1.91002 4.91924 1.82821 4.88507C1.59635 4.78819 1.22406 4.80739 1.01489 4.927ZM22.6177 4.90518C22.5289 4.95043 21.9468 5.44829 21.3241 6.01152C20.0616 7.15344 20.019 7.21008 20.0592 7.69412C20.1108 8.3171 20.7748 8.71593 21.3403 8.46367C21.6226 8.33772 23.7138 6.44677 23.8505 6.19396C24.0351 5.85231 23.9757 5.40093 23.7073 5.10554C23.4574 4.8305 22.9479 4.7368 22.6177 4.90518ZM11.4141 7.39477C9.25248 7.56169 7.08069 8.38958 5.11092 9.7976C3.41326 11.0111 1.75178 12.8735 0.758216 14.6767C0.530712 15.0896 0.504438 15.1663 0.490842 15.4562C0.477155 15.7489 0.48827 15.7973 0.614493 15.9939C0.871715 16.3946 1.41326 16.5357 1.84493 16.3144C2.06513 16.2015 2.11079 16.1418 2.50195 15.4563C4.27872 12.3426 7.43387 9.98735 10.6191 9.39702C12.9821 8.9591 15.4562 9.50845 17.684 10.9657C18.4878 11.4914 19.042 11.9455 19.8013 12.7003C20.8087 13.7017 21.5052 14.5966 22.0717 15.6171C22.2049 15.8571 22.347 16.0918 22.3875 16.1387C22.5246 16.2977 22.8154 16.4125 23.0811 16.4125C23.6253 16.4125 23.9998 16.0388 23.9998 15.4957C23.9998 15.1739 23.885 14.9156 23.384 14.1101C21.8822 11.6951 19.4343 9.51318 16.9916 8.41218C15.2373 7.6215 13.2271 7.25482 11.4141 7.39477ZM11.6563 10.9777C9.76518 11.2444 8.28031 12.5916 7.82375 14.4547C7.70726 14.9301 7.68475 15.88 7.77933 16.329C7.9784 17.2739 8.364 18.0034 9.01381 18.6643C9.41742 19.0748 9.78782 19.337 10.3215 19.5897C10.9813 19.9023 11.4384 20 12.241 20C13.0437 20 13.5007 19.9023 14.1606 19.5897C14.7354 19.3174 15.0826 19.0626 15.5503 18.5695C16.6198 17.4418 17.0162 15.8878 16.627 14.3485C16.2085 12.6931 14.8586 11.3945 13.1923 11.044C12.7832 10.9579 12.0276 10.9253 11.6563 10.9777ZM12.7633 12.8836C13.6835 13.0786 14.4361 13.7506 14.7541 14.6613C14.9037 15.0898 14.9222 15.7661 14.7959 16.1912C14.4001 17.5244 13.0247 18.3678 11.72 18.0775C11.2061 17.9632 10.7669 17.726 10.4047 17.3672C9.85828 16.8258 9.6108 16.2478 9.60611 15.5022C9.60134 14.7413 9.85254 14.1384 10.4005 13.5956C11.0324 12.9697 11.9147 12.7038 12.7633 12.8836Z"
              />
            </svg>
          </div>
        </div>
        <div
          class="input-group input-group--password input-group--confirm-pass"
          :class="[confirmPass === true ? 'active' : '']"
        >
          <label for="">Повторите пароль</label>
          <input
            type="password"
            placeholder="password"
            name="user-submitPass"
            v-model="submitPass"
            required
            @input="input"
          />
          <div class="input-group__pass-icon" @click="showConfirmPass()">
            <svg
              width="24"
              height="20"
              viewBox="0 0 24 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M11.8286 0.103348C11.554 0.243626 11.3804 0.474713 11.3233 0.776076C11.2975 0.911899 11.2764 1.60649 11.2764 2.31959C11.2764 3.0327 11.2975 3.72729 11.3233 3.86311C11.4767 4.67217 12.478 4.9073 12.9963 4.25597L13.1367 4.07945V2.31959V0.559734L12.9963 0.383215C12.8135 0.153598 12.5108 0 12.241 0C12.1136 0 11.9512 0.0406962 11.8286 0.103348ZM1.01489 4.927C0.916224 4.98345 0.772179 5.1083 0.694737 5.20443C0.575175 5.35289 0.551427 5.42569 0.537556 5.68673C0.52396 5.9417 0.539439 6.02764 0.628043 6.18996C0.768964 6.4481 2.85738 8.33731 3.14175 8.4639C3.70759 8.7157 4.37123 8.31696 4.4229 7.69412C4.46337 7.20604 4.42226 7.1517 3.13265 5.9891C2.49704 5.41605 1.91002 4.91924 1.82821 4.88507C1.59635 4.78819 1.22406 4.80739 1.01489 4.927ZM22.6177 4.90518C22.5289 4.95043 21.9468 5.44829 21.3241 6.01152C20.0616 7.15344 20.019 7.21008 20.0592 7.69412C20.1108 8.3171 20.7748 8.71593 21.3403 8.46367C21.6226 8.33772 23.7138 6.44677 23.8505 6.19396C24.0351 5.85231 23.9757 5.40093 23.7073 5.10554C23.4574 4.8305 22.9479 4.7368 22.6177 4.90518ZM11.4141 7.39477C9.25248 7.56169 7.08069 8.38958 5.11092 9.7976C3.41326 11.0111 1.75178 12.8735 0.758216 14.6767C0.530712 15.0896 0.504438 15.1663 0.490842 15.4562C0.477155 15.7489 0.48827 15.7973 0.614493 15.9939C0.871715 16.3946 1.41326 16.5357 1.84493 16.3144C2.06513 16.2015 2.11079 16.1418 2.50195 15.4563C4.27872 12.3426 7.43387 9.98735 10.6191 9.39702C12.9821 8.9591 15.4562 9.50845 17.684 10.9657C18.4878 11.4914 19.042 11.9455 19.8013 12.7003C20.8087 13.7017 21.5052 14.5966 22.0717 15.6171C22.2049 15.8571 22.347 16.0918 22.3875 16.1387C22.5246 16.2977 22.8154 16.4125 23.0811 16.4125C23.6253 16.4125 23.9998 16.0388 23.9998 15.4957C23.9998 15.1739 23.885 14.9156 23.384 14.1101C21.8822 11.6951 19.4343 9.51318 16.9916 8.41218C15.2373 7.6215 13.2271 7.25482 11.4141 7.39477ZM11.6563 10.9777C9.76518 11.2444 8.28031 12.5916 7.82375 14.4547C7.70726 14.9301 7.68475 15.88 7.77933 16.329C7.9784 17.2739 8.364 18.0034 9.01381 18.6643C9.41742 19.0748 9.78782 19.337 10.3215 19.5897C10.9813 19.9023 11.4384 20 12.241 20C13.0437 20 13.5007 19.9023 14.1606 19.5897C14.7354 19.3174 15.0826 19.0626 15.5503 18.5695C16.6198 17.4418 17.0162 15.8878 16.627 14.3485C16.2085 12.6931 14.8586 11.3945 13.1923 11.044C12.7832 10.9579 12.0276 10.9253 11.6563 10.9777ZM12.7633 12.8836C13.6835 13.0786 14.4361 13.7506 14.7541 14.6613C14.9037 15.0898 14.9222 15.7661 14.7959 16.1912C14.4001 17.5244 13.0247 18.3678 11.72 18.0775C11.2061 17.9632 10.7669 17.726 10.4047 17.3672C9.85828 16.8258 9.6108 16.2478 9.60611 15.5022C9.60134 14.7413 9.85254 14.1384 10.4005 13.5956C11.0324 12.9697 11.9147 12.7038 12.7633 12.8836Z"
              />
            </svg>
          </div>
        </div>
        <div class="input-file">
          <input
            type="file"
            id="user-avatar"
            name="image"
            @change="changeUserAvatar()"
          />
          <label for="user-avatar">
            <div class="input-file__image">
              <img src="../assets/images/inpit-file-image.png" alt="" />
            </div>
            <div class="input-file__text">Название изображения.jpg</div>
          </label>
        </div>
        <div class="error">Такой пользователь уже существует</div>
        <button class="blue-btn">
          <svg
            width="15"
            height="20"
            viewBox="0 0 15 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M6.56161 0.0728876C5.91322 0.212572 5.2696 0.506688 4.73817 0.906183C4.21092 1.30251 3.56675 2.09242 3.4433 2.49403C3.32693 2.87264 3.49016 3.3161 3.82832 3.53985C3.97782 3.63881 4.02672 3.64937 4.33554 3.64937C4.65211 3.64937 4.68958 3.64073 4.84433 3.53198C4.94169 3.46353 5.10488 3.27589 5.23549 3.08215C5.74592 2.32493 6.48256 1.89559 7.3635 1.84188C7.8442 1.81255 8.23849 1.89673 8.71215 2.12974C9.01698 2.27967 9.13871 2.36855 9.39669 2.62941C9.74815 2.98483 9.92175 3.2532 10.0732 3.67538C10.1721 3.95108 10.1767 4.00099 10.1907 4.94999C10.1988 5.49324 10.1996 5.93756 10.1926 5.9374C10.1856 5.93725 10.0479 5.89226 9.8865 5.83746C7.17621 4.91662 4.18573 5.63085 2.23871 7.66392C0.787221 9.17956 0.0354827 11.2856 0.218508 13.3236C0.496117 16.4148 2.54925 18.913 5.50872 19.7606C6.2231 19.9652 6.51542 20 7.51996 20C8.34794 20 8.51184 19.9892 8.90859 19.9089C11.1563 19.4539 13.0257 18.031 14.0304 16.0101C14.9231 14.2146 15.0499 12.2789 14.4018 10.3383C14.0363 9.24375 13.2266 8.02938 12.372 7.29408L12.0966 7.05707L12.0758 5.47059C12.0562 3.97552 12.0497 3.86279 11.9631 3.51466C11.5354 1.79362 10.3228 0.563915 8.59688 0.100973C8.14391 -0.0205222 7.06438 -0.0354255 6.56161 0.0728876ZM8.73535 7.43787C9.81539 7.70922 10.6829 8.21104 11.4387 9.00158C12.2106 9.80902 12.6992 10.796 12.8843 11.922C12.93 12.2004 12.94 12.4518 12.924 12.9199C12.9006 13.6043 12.8337 13.9701 12.6233 14.5628C11.8265 16.8074 9.59254 18.3009 7.23293 18.1665C3.79417 17.9706 1.38339 14.6922 2.2436 11.3815C2.78016 9.31631 4.47824 7.75839 6.62029 7.36605C7.12504 7.27362 8.23098 7.31117 8.73535 7.43787ZM7.18747 10.0071C6.43746 10.1403 5.86616 10.695 5.70614 11.4452C5.56954 12.0857 5.78249 12.7179 6.29472 13.1921L6.56161 13.4392V14.4587C6.56161 15.0364 6.5798 15.563 6.60355 15.6737C6.66109 15.9421 6.83128 16.1629 7.07627 16.287C7.25155 16.3759 7.31683 16.3877 7.56311 16.3753C7.8032 16.3632 7.87373 16.3425 8.01565 16.2428C8.20876 16.107 8.34297 15.9247 8.39946 15.7214C8.4214 15.6424 8.43884 15.1024 8.43896 14.4991L8.4392 13.4183L8.64953 13.2595C9.06479 12.946 9.3393 12.3765 9.3384 11.8304C9.33754 11.3107 9.15628 10.8712 8.79649 10.5162C8.35525 10.0809 7.78599 9.90083 7.18747 10.0071Z"
              fill="white"
            />
          </svg>
          Зарегистрироваться
        </button>
        <div class="autorization__links">
          <div class="autorization__notation">
            Уже зарегистрированы?
            <router-link class="autorization__link" to="/">Войти</router-link>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  components: {},
  data: () => ({
    pass: false,
    confirmPass: false,
    login: null,
    username: null,
    post: null,
    email: null,
    password: null,
    submitPass: null,
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
  }),
  beforeMount() {
    document.querySelector("title").textContent = "Регистрация";
  },
  methods: {
    showPass() {
      let pass = document.querySelector(".input-group--password input").type;
      if (pass === "password") {
        document.querySelector(".input-group--password input").type = "text";
        this.pass = true;
      } else {
        document.querySelector(".input-group--password input").type =
          "password";
        this.pass = false;
      }
    },
    showConfirmPass() {
      let pass = document.querySelector(
        ".input-group--confirm-pass input"
      ).type;
      if (pass === "password") {
        document.querySelector(".input-group--confirm-pass input").type =
          "text";
        this.confirmPass = true;
      } else {
        document.querySelector(".input-group--confirm-pass input").type =
          "password";
        this.confirmPass = false;
      }
    },
    changeUserAvatar() {
      document.querySelector(".input-file__text").textContent =
        document.querySelector(".input-file input").files[0].name;
    },
    input() {
      document.querySelector('input[name="password"]').style.borderColor =
        "rgba(3, 0, 135, 0.3)";
      document.querySelector(
        'input[name="user-submitPass"]'
      ).style.borderColor = "rgba(3, 0, 135, 0.3)";
      document.querySelector('input[name="login"]').style.borderColor =
        "rgba(3, 0, 135, 0.3)";
    },
    registration() {
      let formResult = {
        login: this.login,
        username: this.username,
        post: this.post,
        email: this.email,
        password: this.password,
        submitPass: this.submitPass,
      };
      if (formResult.password !== formResult.submitPass) {
        document.querySelector('input[name="password"]').style.borderColor =
          "red";
        document.querySelector(
          'input[name="user-submitPass"]'
        ).style.borderColor = "red";
      } else if (formResult.login == formResult.password) {
        document.querySelector('input[name="password"]').style.borderColor =
          "red";
        document.querySelector('input[name="login"]').style.borderColor = "red";
      } else if (
        formResult.password.length < 8 ||
        !formResult.password.match(/[a-zA-Z]/) ||
        !formResult.password.match(/[0-9]/)
      ) {
        document.querySelector('input[name="password"]').style.borderColor =
          "red";
      } else {
        axios
          .post("/api/userExist", {
            formResult,
          })
          .then((result) => {
            if (result.data) {
              document.querySelector(".autorization__form").submit();
            } else {
              document.querySelector(".error").classList.add("active");
            }
          });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.autorization {
  height: 100%;
}
.error {
  color: red;
  margin-bottom: 30px;
  display: none;
}
.error.active {
  display: block;
}

.element__label {
  cursor: pointer;
  margin-right: 10px;
}
.element__popup {
  position: absolute;
  padding: 10px;
  text-align: center;
  left: 10px;
  top: 35px;
  background: #fff;
  border-radius: 10px;
  z-index: -1;
  opacity: 0;
  width: max-content;
  transition: ease-in-out 0.2s;
  cursor: default;
}

.element__label:hover .element__popup {
  z-index: 1000;
  opacity: 1;
}

.input-group label {
  display: flex;
  align-items: center;
}
</style>
