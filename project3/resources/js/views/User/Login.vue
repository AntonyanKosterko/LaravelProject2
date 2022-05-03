<template>
  <div id="app">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
          v-model="form.email"
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
        />
        <div id="emailHelp" class="form-text">
          We'll never share your email with anyone else.
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input
          v-model="form.password"
          type="password"
          class="form-control"
          id="exampleInputPassword1"
        />
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="button" class="btn btn-primary" @click="getToken()">Submit</button>
    </form>
    <h3 v-if="!isCorrect">Login or password is incorrect</h3>
  </div>
</template>

<style scoped>
form {
  padding: 20px;
  padding-right: 70%;
}
h3{
  color: red;
}
</style>

<script>
export default {
    data(){
        return {
            form: {
                email: null,
                password: null,
            },
            token: null,
            isCorrect: true,
        }
    },

    methods: {
        getToken() {
        axios
            .post("api/token", {
            email: this.form.email,
            password: this.form.password,
            device_name: navigator.userAgent,
            })
            .then((response) => {
              console.log("Token", response.data);
              this.token = response.data;
              if(this.token == ''){
                this.isCorrect = false;
              }else{
                localStorage.setItem('token', this.token);
                this.$router.push('/');
              }
            });
            
        },
    },

    mounted(){
    }
};
</script>
