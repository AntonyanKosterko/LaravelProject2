<template>
    <div>
        <Navbar></Navbar>
        <router-view></router-view>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';

export default {
    data(){
        return {
        }
    },

    components:{
        Navbar: Navbar,
    },

    methods: {
        getUser(){
            this.$store.dispatch("getUser");
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