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

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/listreports",
    name: "ListReports",
    component: ListReports,
    meta: { requiresAuth: true},
  },
  {
    path: "/restorepass",
    name: "restorepass",
    component: RestorePass,
  },
  {
    path: "/registration",
    name: "registration",
    component: Registration,
  },
  {
    path: "/newreport",
    name: "Newreport",
    component: Newreport,
    meta: { requiresAuth: true},
  },
  {
    path: "/report/:id",
    name: "Report",
    component: Report,
    meta: { requiresAuth: true},
  },
  {
    path: "/settings",
    name: "Settings",
    component: Settings,
    meta: { requiresAuth: true},
  },
  {
    path: "/personalrea",
    name: "PersonalArea",
    component: PersonalArea,
    meta: { requiresAuth: true},
  },
  {
    path: "/password",
    name: "Password",
    component: Password,
    meta: { requiresAuth: true},
  },
  {
    path: "/reports/:id",
    name: "Reports",
    component: Reports,
    meta: { requiresAuth: true},
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

// router.beforeEach((to, from, next) => {
  // if(to.meta.requiresAuth) {
  // } else {
  //   next();
  // }
// })

export default router;
