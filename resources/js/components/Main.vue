<template>
    <div id="search-container">
        <div class="input-container">
            <form action="">
                
            </form>
        </div>
        <div class="dataUi_container d-flex container-fluid">
            <div class="overflow apartments-container row">
                <div class="col-12 col-md-6 marble-background">
                    <ul class="p-0">
                        <li v-for="(apartment, index) in apartments" :key="index" class="p-4 my-3">
                            <div class="d-flex">
                                <div>
                                    <img class="w-100" src="https://www.lignius.it/fileadmin/_processed_/b/8/csm_suedtirolhaus_MirrorHouses_5cbac.0_a556da6959.jpg" alt="">
                                </div>
                                <div>
                                    <h2>{{ apartment.name }}</h2>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-md-6">
                    <img src="https://miro.medium.com/max/1400/1*qYUvh-EtES8dtgKiBRiLsA.png" alt="">
                </div>
            </div>
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
        },
        saveId:function(e){
            let apartment_id = e.target.id;
            console.log(e.target.id);
        }
    },
    created() {
        this.getAppartments();
    }
}
</script>

<style lang="scss" scoped>
    

</style>