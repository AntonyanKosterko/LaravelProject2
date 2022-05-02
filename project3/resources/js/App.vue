<template>
    <div>
        <Navbar></Navbar>
        <router-view></router-view>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';

export default {
    components:{
        Navbar: Navbar,
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