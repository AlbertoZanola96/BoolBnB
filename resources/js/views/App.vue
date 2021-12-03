<template>
    <div>
        <!-- <Home />
        <Search />
        <Show /> -->
        <RouterView />
    </div>
</template>

<script>
import Home from '../components/Home.vue';
import Search from '../components/Search.vue';
import Show from '../components/Show.vue';

export default {
    name: 'App',
    components: {
        Home,
        Search,
        Show
    },
    data() {
        return {
            apartment: ''
        }
    }
}
</script>

<style lang="scss" scoped>

</style>