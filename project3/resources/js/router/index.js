import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/HomeView.vue'
import Admin from '../views/AdminView.vue'
import Login from '../views/User/Login.vue'
import Register from '../views/User/Register.vue'

Vue.use(VueRouter);

function check(to, from, next) {
  let token = localStorage.getItem("token");

  if (!token) {
      next("/login");
  } else {
      axios
          .get("/api/check-token", {
              headers: {
                  Authorization: "Bearer " + token,
              },
          })
          .then(() => {
              next();
          })
          .catch(() => {
              next("/login");
          });
  }
}


const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    beforeEnter: check,
},


  {
    path: '/admin',
    name: 'Admin',
    component: Admin,
    beforeEnter: check,
  },

  {
    path: '/login',
    name: 'Login',
    component: Login
  },

  /*
  Пока нашел более удобный, но возможно менее эффективный способ логаута
  {
    path: '/logout',
    name: 'Logout',
    component: Home
  },
  */

  {
    path: '/register',
    name: 'Register',
    component: Register
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router