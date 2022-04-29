<template>
    <div>
        <Navbar></Navbar>
        <Home></Home>
    </div>
</template>

<style scoped>

</style>

<script>
import Home from "../views/HomeView.vue"
import Navbar from "../components/Navbar.vue"

export default({
    components: {
        Home,
        Navbar,
    },
})
</script>
