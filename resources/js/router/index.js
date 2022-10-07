import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import ListReports from "../views/ListReports.vue";
import RestorePass from "../views/RestorePass.vue";
import Registration from "../views/Registration.vue";
import Newreport from "../views/Newreport.vue";
import Settings from "../views/Settings.vue";
import PersonalArea from "../views/PersonalArea.vue";
import Password from "../views/Password.vue";
import Reports from "../views/Reports.vue";
import Report from "../views/Report.vue";
import ErrorPage from "../views/ErrorPage.vue";
import NewPassword from "../views/NewPassword.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: { requiresAuth: false },
  },
  {
    path: "/listreports",
    name: "ListReports",
    component: ListReports,
    meta: { requiresAuth: true },
  },
  {
    path: "/restorepass",
    name: "restorepass",
    component: RestorePass,
    meta: { requiresAuth: false },
  },
  {
    path: "/registration",
    name: "registration",
    component: Registration,
    meta: { requiresAuth: false },
  },
  {
    path: "/newreport",
    name: "Newreport",
    component: Newreport,
    meta: { requiresAuth: true },
  },
  {
    path: "/report/:id",
    name: "Report",
    component: Report,
    meta: { requiresAuth: true },
  },
  {
    path: "/settings",
    name: "Settings",
    component: Settings,
    meta: { requiresAuth: true },
  },
  {
    path: "/personalrea",
    name: "PersonalArea",
    component: PersonalArea,
    meta: { requiresAuth: true },
  },
  {
    path: "/password",
    name: "Password",
    component: Password,
    meta: { requiresAuth: true },
  },
  {
    path: "/newpassword/:token",
    name: "NewPassword",
    component: NewPassword,
    meta: { requiresAuth: false },
  },
  {
    path: "/reports/:id",
    name: "Reports",
    component: Reports,
    meta: { requiresAuth: true },
  },
  {
    path: '/:pathMatch(.*)*',
    name: '404',
    component: ErrorPage,
  },
  // {
  //   path: "/restorepass",
  //   name: "restorepass",
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () =>
  //     import(/* webpackChunkName: "restorepass" */ "../views/RestorePass.vue"),
  // },
];

const router = createRouter({
  history: createWebHistory(),  
  routes,
});

router.beforeEach((to, from, next) => {
  let user = document.querySelector('meta[name="user"]')
  if (to.meta.requiresAuth) {
    if (!user) {
      next({ name: 'Home' })
    } else {
      next()
    }
  } else {
    next()
  }
})


export default router;
