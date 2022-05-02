<template>
    <div>
        
        <div>
            <router-link to="/">Home</router-link> |
            <router-link to="/admin">Admin</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
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
    padding: 2em;
}
</style>