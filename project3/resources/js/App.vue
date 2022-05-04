<template>
    <div>
        <Navbar :user="user"></Navbar>
        <router-view></router-view>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';

export default {
    data(){
        return {
            user: null,
        }
    },

    components:{
        Navbar: Navbar,
    },

    methods: {
        getUser(){
            axios.get('api/user', {
                headers: {
                    "Authorization" : 'Bearer ' + localStorage.getItem('token'),
                }
                }).then(response => {
                    //console.log(response.data);
                    this.user = response.data;
            });
        },
    },

    mounted() {
        this.getUser();
        console.log("App mounted.");
        console.log("You can use axios");
    },
};
</script>

<style>
body {
    font-family: Arial;
    margin: 0;
}
</style>