<template>
    <div>
        <Navbar :isAuth="isAuth"></Navbar>
        <router-view  :catchAuthInfo='catchAuthInfo'></router-view>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';

export default {
    data(){
        return {
            isAuth : null,
        }
    },

    components:{
        Navbar: Navbar,
    },

    methods: {
        catchAuthInfo(data){
            console.log('child component said data', data);
            this.isAuth = data.isAuth;
        }
    },

    mounted() {
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