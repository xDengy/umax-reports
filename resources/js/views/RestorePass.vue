<template>
  <div class="autorization">
    <div class="autorization__wrap">
      <div class="autorization__logo">
        <img src="../assets/images/logotip.svg" alt="" />
      </div>
      <form class="autorization__form" method="POST" @submit.prevent="checkMail" enctype="multipart/form-data" action="/resetPassword">
        <input type="hidden" name="_token" :value="csrf">
        <div class="input-group">
          <label for="">E-mail</label>
          <input type="text" placeholder="info@mail.ru" name="email" v-model="email" @input="input" />
        </div>
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
          Восстановиить пароль
        </button>
        <div class="autorization__links">
          <router-link class="autorization__link" to="/">Назад</router-link>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    email: null,
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
  }),
  beforeMount() {
    document.querySelector('title').textContent = 'Восстановиить пароль'
  },
  methods: {
    checkMail() {
      axios.post('/api/emailExist', {
        email: this.email
      }).then(result => {
        if(result.data) {
          document.querySelector('.autorization__form').submit();
        } else {
          document.querySelector('input[name="email"]').style.borderColor = 'red'
        }
      })
    },
    input() {
      document.querySelector('input[name="email"]').style.borderColor = 'rgba(3, 0, 135, 0.3)';
    },
  }
};
</script>

<style lang="scss"></style>
