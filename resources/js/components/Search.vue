<template>
<div id="search-container">
    <section id="input_container" class="container-fluid border-bottom">
        <div class="row align-items-center h-100 align-items-center">
            <div class="col-12">
                <!-- <form action="" class="d-flex px-2"> -->
                    <div class="input-group justify-content-center align-items-center">
                        <div>
                            <!-- num_rooms  -->
                            <input 
                                class="btn" 
                                v-model="num_rooms" 
                                id="num_rooms" 
                                name="num_rooms" 
                                type="number" 
                                min="0" 
                                max="10" 
                                placeholder="N. camere">
                        </div>

                            <!-- num_beds  -->
                        <div>
                            <input 
                                class="btn" 
                                v-model="num_beds" 
                                id="num_beds" 
                                name="num_beds" 
                                type="number" 
                                min="0" 
                                max="10" placeholder="N. letti">
                        </div>

                            <!-- num_bathrooms  -->
                        <div>
                            <input 
                                class="btn" 
                                v-model="num_bathrooms" 
                                id="num_bathrooms" 
                                name="num_bathrooms" 
                                type="number" 
                                min="0" 
                                max="10" 
                                placeholder="N. bagni">
                        </div>

                            <!-- address  -->
                        <div>
                            <input 
                                type="text" 
                                v-model="address" 
                                class="btn" 
                                id="address" 
                                name="address" 
                                placeholder="In quale città?">
                        </div>

                            <!-- distance  -->
                        <div>
                            <div>
                                <label for="distance" class="d-flex justify-content-around m-0">
                                    <span>Distanza:</span>
                                    <output> {{ distance }} km</output>
                                </label>
                                </div>
                            <div class="d-flex align-items-center">
                                <input type="range" v-model="distance" class="distance" id="distance" name="distance" oninput="this.nextElementSibling.value = this.value + ' km'">
                            </div>
                        </div>

                            <!-- btn cerca  -->
                        <button class="btn btn-primary" v-on:click="getApartments(); mapDisplay();">
                            Inizia a cercare
                        </button>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </section>


    <!-- apartment cards  -->
    <section id="dataUi_container" class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-6 p-0 apartments-container">
                <ul class="px-4 py-2">
                    <li v-for="(apartment, index) in apartments" :key="index" class="p-4 my-4 border container-fluid">
                        <div class="d-flex row">
                            <div class="img-box col-12 col-lg-5 d-flex align-items-center">
                                <img class="w-100" src="https://www.lignius.it/fileadmin/_processed_/b/8/csm_suedtirolhaus_MirrorHouses_5cbac.0_a556da6959.jpg" alt="">
                            </div>

                            <div class="col-12 col-lg-7 py-2 px-4 d-flex flex-column justify-content-between">
                                <!-- apartment name  -->
                                <div>
                                    <h2>{{ apartment.name }}</h2>
                                    <hr class="m-0 d-none d-lg-block">
                                </div>

                                <!-- services list  -->
                                <ul id="services_list" class="d-none d-lg-flex flex-wrap p-0">
                                    <!-- num_rooms  -->
                                    <li>
                                        <i class="fas fa-door-open font-xxs"></i>
                                        <span class="d-inline-block mx-1">{{ apartment.num_rooms }} camere</span> 
                                    </li>
                                    <li class="mx-3">|</li>
                                    <!-- num_beds  -->
                                    <li>
                                        <i class="fas fa-bed font-xxs"></i>
                                        <span class="d-inline-block mx-1">{{ apartment.num_beds }} letti</span>
                                    </li>
                                    <li class="mx-3">|</li>
                                    <!-- square meters  -->
                                    <li>
                                        <i class="fas fa-ruler-combined font-xxs"></i>
                                        <span class="d-inline-block mx-1">{{ apartment.square_meters }}mq</span>
                                    </li>
                                </ul>
                                    
                                <div class="pt-2">
                                    <router-link :to="{ name: 'Show', params: {slug: apartment.slug, id: apartment.id} }">
                                        <button class="btn btn-primary" >
                                            Visualizza immobile &#8594;
                                        </button>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-7 col-lg-6 p-0 box-img">
                <div id="map-div"></div>
            </div>
        </div>
    </section>
</div>
</template>

<script>

export default {
    name: 'Search',
    data() {
        return {
            apartments: [],
            apiSearchApartments: 'http://127.0.0.1:8000/api/apartments?',
            tomtom: 'https://api.tomtom.com/search/2/geocode/',
            tomtomKey: '.json?key=bUmDAHcIFvGHLQEcg77j9yMpuaI5gGMF',
            num_rooms: '',
            num_bathrooms: '',
            num_beds: '',
            address: this.$route.params.inputSearch,
            distance: 20,
            lat: '',
            lon: '',
            map : {},
            API_KEY: 'bUmDAHcIFvGHLQEcg77j9yMpuaI5gGMF',
            AMSTERDAM: [4.899431, 52.379189],
        }
    },
    methods: {
        async getApartments() {

                if (this.address) {
                    axios.get(this.tomtom + this.address + this.tomtomKey)
                        .then((res) => {
                            this.lat = res.data.results[0].position.lat;
                            this.lon = res.data.results[0].position.lon;
                        });
                }

                axios.get(
                    this.apiSearchApartments +
                        "num_rooms=" +
                        this.num_rooms +
                        "&num_beds=" +
                        this.num_beds +
                        "&num_bathrooms=" +
                        this.num_bathrooms +
                        "&distance=" +
                        this.distance +
                        "&lat=" +
                        this.lat +
                        "&lon=" +
                        this.lon
                    )
                    .then((res) => {
                        this.apartments = res.data.results;
                    });
        },
        mapDisplay() {
            console.log(this.lon, this.lat);
            this.map = tt.map({
            container: 'map-div',
            key: this.API_KEY,
            source: 'vector',
            center: [this.lon, this.lat],
            zoom: 13,
            });
            this.map.addControl(new tt.FullscreenControl());
            this.map.addControl(new tt.NavigationControl());

            // this.map.flyTo({center: [this.lon, this.lat], zoom: 9});
        }
    },
    created() {
        this.getApartments();
    },
    mounted() {
        this.mapDisplay();
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/_variables";

#search-container{
    height: calc(100vh - 60px);
    
    #input_container{
        height: 8%;

        input{
            border: 1px solid rgb(107, 107, 107);
            min-width: 120px;
            margin: 0 15px;
        }
    }

    #dataUi_container{
        height: 92%;


        .row{
            height: 100%;


            .apartments-container{
                height: 100%;


                ul:not(#services_list){
                    height: 100%;
                    overflow-y: scroll;
                    list-style: none;
                    background-color: $anti-flash-white;

                    /* width */
                    &::-webkit-scrollbar {
                    width: 10px;
                    }

                    /* Track */
                    &::-webkit-scrollbar-track {
                    background: #f1f1f1;
                    }

                    /* Handle */
                    &::-webkit-scrollbar-thumb {
                    background: #888;
                    }

                    /* Handle on hover */
                    &::-webkit-scrollbar-thumb:hover {
                    background: #555;
                    }

                    li{
                        background-color: white;
                        box-shadow: 1px 7px 29px -11px rgba(0,0,0,0.54);
                    }

                    ul{
                        list-style: none;
                    }
                }
            }

            .box-img {
                height: 100%;


                #map-div{
                    width: 100%;
                    height: 100%;
                }
            }
            
        }
    }

}
</style>