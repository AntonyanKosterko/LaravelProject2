import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/HomeView.vue'
import Admin from '../views/AdminView.vue'
import Login from '../views/User/Login.vue'
import Register from '../views/User/Register.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },

  {
    path: '/admin',
    name: 'Admin',
    component: Admin
  },

  {
    path: '/login',
    name: 'Login',
    component: Login
  },

  {
    path: '/logout',
    name: 'Logout',
    component: Home
  },

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