import './bootstrap';

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import Maska from "maska";
import axios from "axios";
import VueAxios from "vue-axios";

// Vue.use(VueAxios, axios);

// import VueTheMask from "vue-the-mask";
// Vue.use(VueTheMask);

window.axios = require("axios");

createApp(App)
  .use(store)
  .use(router)
  .use(Maska)
  // .use(VueAxios, axios)
  .mount("#app");
