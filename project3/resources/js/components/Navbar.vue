<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navigation</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item" v-if="checkAuthentication()">
            <router-link class="nav-link" aria-current="page" to="/"
              >Home</router-link
            >
          </li>
          <li class="nav-item" v-if="checkAuthentication()">
            <router-link class="nav-link" aria-current="page" to="/admin"
              >Admin</router-link
            >
          </li>
          <li v-if="!checkAuthentication()">
            <p class="p_auth p-0">You're not authorized, please log in</p>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-end">
          <li class="nav-item" v-if="!checkAuthentication()">
            <router-link
              class="nav-link"
              aria-current="page"
              to="/login"
              >Login</router-link
            >
          </li>
          <li class="nav-item" right v-if="!checkAuthentication()">
            <router-link
              class="nav-link"
              aria-current="page"
              to="/register"
              >Register</router-link
            >
          </li>
          <li class="nav-item" v-if="checkAuthentication()">
            <p
              class="nav-link m-0 user__info"
              >{{ user.name }}</p
            >
          </li>
          <li class="nav-item" @click="logoutUser()" right v-if="checkAuthentication()">
            <a
              class="nav-link logout_pos"
              href="/"
              >Logout</a
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.p_auth{
  margin: 0;
  padding-top: 8px;
  color: red;
}
</style>

<script>
export default {
  methods:{
    checkAuthentication(){
      //console.log(this.user);
      return this.user != null;
    },
    logoutUser(){
      localStorage.clear();
    },
  },
  props: {
    user: Object,
  },
};
</script>
