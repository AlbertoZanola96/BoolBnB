<template>
    <div>
        <div v-for="(apartment, index) in apartments" :key="index">
            <h1>{{ apartment.name }}</h1>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Main',
    data() {
        return {
            apartments: []
        }
    },
    methods: {
        getAppartments() {
            axios.get('http://127.0.0.1:8000/api/apartments')
                .then(res => this.apartments = res.data.results)
        }
    },
    created() {
        this.getAppartments();
    }
}
</script>

<style lang="scss" scoped>
    

</style>