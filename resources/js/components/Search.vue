<template>
<div id="search-container">
    <section id="input_container" class="container-fluid border-bottom">
        <div class="row align-items-center h-100 align-items-center">
            <div class="col-12 d-none d-md-block input-lg mt-md-1">
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
                                min="1" 
                                max="10" 
                                placeholder="N. camere">
                        </div>

                            <!-- num_beds  -->
                        <div>
                            <input
                                required
                                class="btn" 
                                v-model="num_beds" 
                                id="num_beds" 
                                name="num_beds" 
                                type="number" 
                                min="1" 
                                max="10" placeholder="N. letti">
                        </div>

                            <!-- num_bathrooms  -->
                        <div>
                            <input
                                required 
                                class="btn" 
                                v-model="num_bathrooms" 
                                id="num_bathrooms" 
                                name="num_bathrooms" 
                                type="number" 
                                min="1" 
                                max="10" 
                                placeholder="N. bagni">
                        </div>

                            <!-- address  -->
                        <div>
                            <input
                                required 
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
                        <button class="btn blue-background text-white" v-on:click="getApartments">
                            Inizia a cercare
                        </button>
                    </div>
                <!-- </form> -->
            </div>

            <div class="col-12 d-none d-md-block input-lg">
                <div class="d-flex justify-content-center align-items-center services py-3 overflow-x">
                    <span for="services" class="d-block font-s font-weight-bold">Servizi |</span>

                    <div v-for="(apartmentService, index) in apartmentServices" :key="index">
                        <input
                        class="form-check-input" type="checkbox" :name="apartmentService" :value="apartmentService" :id="apartmentService">
                        <label class="form-check-label py-1 px-2 mx-2 shadow" :for="apartmentService">
                            {{ apartmentService }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-12 d-md-none">
                <a href="" data-toggle="modal" data-target="#leads" class="btn blue-background text-white w-100">
                    <i class="fas fa-sliders-h"></i>
                    <span class="ml-3">Filtri di ricerca</span>
                </a>
            </div>

            <div class="">
                <div class="modal fade" id="leads" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <div class="mt-2 d-flex justify-content-center align-items-end">
                                <h3 class="modal-title text-white" id="staticBackdropLabel">Filtri di ricerca</h3>
                            </div>
                            <button type="button" class="close text-white position-absolute" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body">
                                <form method="POST" action="" class="container">
                                    <div class="row input-group ml-0">
                                        <div class="col-12 my-3">
                                            <!-- num_rooms  -->
                                            <input 
                                                class="btn w-100" 
                                                v-model="num_rooms" 
                                                id="num_rooms" 
                                                name="num_rooms" 
                                                type="number" 
                                                min="1" 
                                                max="10" 
                                                placeholder="N. camere">
                                        </div>

                                            <!-- num_beds  -->
                                        <div class="col-12 my-3">
                                            <input
                                                required
                                                class="btn w-100" 
                                                v-model="num_beds" 
                                                id="num_beds" 
                                                name="num_beds" 
                                                type="number" 
                                                min="1" 
                                                max="10" placeholder="N. letti">
                                        </div>

                                            <!-- num_bathrooms  -->
                                        <div class="col-12 my-3">
                                            <input
                                                required 
                                                class="btn w-100" 
                                                v-model="num_bathrooms" 
                                                id="num_bathrooms" 
                                                name="num_bathrooms" 
                                                type="number" 
                                                min="1" 
                                                max="10" 
                                                placeholder="N. bagni">
                                        </div>

                                            <!-- address  -->
                                        <div class="col-12 my-3">
                                            <input
                                                required 
                                                type="text" 
                                                v-model="address" 
                                                class="btn w-100" 
                                                id="address" 
                                                name="address" 
                                                placeholder="In quale città?">
                                        </div>

                                            <!-- distance  -->
                                        <div class="col-12 my-3">
                                            <div class="mb-2">
                                                <label for="distance" class="d-flex justify-content-around m-0">
                                                    <span class="white-text">Distanza:</span>
                                                    <output class="white-text"> {{ distance }} km</output>
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input type="range" v-model="distance" class="distance" id="distance" name="distance" oninput="this.nextElementSibling.value = this.value + ' km'">
                                            </div>
                                        </div>

                                        <span for="services" class="d-block w-100 font-s white-text text-center font-weight-bold">Servizi:</span>

                                        <div class="d-flex align-items-center justify-content-center flex-wrap services py-3">
                                            <div v-for="(apartmentService, index) in apartmentServices" :key="index">
                                                <input
                                                    class="form-check-input" type="checkbox" :name="apartmentService + '1'" :value="apartmentService + '1'" :id="apartmentService + '1'">
                                                <label class="form-check-label py-1 px-2 mx-2 my-2 shadow" :for="apartmentService + '1'">
                                                    {{ apartmentService }}
                                                </label>
                                            </div>
                                        </div>
                                        

                                            <!-- btn cerca  -->
                                        <div class="col-12 my-3">
                                            <button class="btn background-gradient text-white w-100" v-on:click="getApartments">
                                                Inizia a cercare
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- apartment cards  -->
    <section id="dataUi_container" class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-6 p-0 apartments-container">
                <ul class="px-4 py-2">
                    <li v-for="(apartment, index) in apartments" :key="index">
                        <div v-if="apartment.visible == 1" class="p-4 my-4 border container-fluid">
                            <div class="d-flex row">
                                <div class="img-box col-12 col-lg-5 d-flex align-items-center">
                                    <img class="w-100" :src="'/storage/' + apartment.image" alt="">
                                </div>

                                <div class="col-12 col-lg-7 py-2 px-4 d-flex flex-column justify-content-between">
                                    <!-- apartment name  -->
                                    <div>
                                        <h2 class="m-0">{{ apartment.name }}</h2>
                                        <hr class="my-2">
                                        <h4 class="font-xxs gray-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span class="ml-2">{{ apartment.address }}</span>
                                        </h4>
                                    </div>

                                    <!-- services list  -->
                                    <ul id="services_list" class="d-none d-lg-flex flex-wrap pl-0 py-3 white-background">
                                        <!-- num_rooms  -->
                                        <li>
                                            <i class="fas fa-door-open font-xxs bruschetta-text"></i>
                                            <span class="d-inline-block mx-1">{{ apartment.num_rooms }} camere</span> 
                                        </li>
                                        <li class="mx-3">|</li>
                                        <!-- num_beds  -->
                                        <li>
                                            <i class="fas fa-bed font-xxs bruschetta-text"></i>
                                            <span class="d-inline-block mx-1">{{ apartment.num_beds }} letti</span>
                                        </li>
                                        <li class="mx-3">|</li>
                                        <!-- square meters  -->
                                        <li>
                                            <i class="fas fa-ruler-combined font-xxs bruschetta-text"></i>
                                            <span class="d-inline-block mx-1">{{ apartment.square_meters }}mq</span>
                                        </li>
                                    </ul>
                                        
                                    <div class="pt-2">
                                        <router-link :to="{ name: 'Show', params: {slug: apartment.slug, id: apartment.apartment_id} }">
                                            <button class="btn blue-background text-white" >
                                                Visualizza immobile &#8594;
                                            </button>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-7 col-lg-6 p-0 box-img">
                <div id="map-div" class="map"></div>
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
            apiSponsored: 'http://127.0.0.1:8000/api/sponsored?',
            tomtom: 'https://api.tomtom.com/search/2/geocode/',
            tomtomKey: '.json?key=bUmDAHcIFvGHLQEcg77j9yMpuaI5gGMF',
            num_rooms: '',
            num_bathrooms: '',
            num_beds: '',
            address: this.$route.params.inputSearch,
            distance: 20,
            lat: 41.89056,
            lon: 12.49427,
            map : undefined,
            API_KEY: 'bUmDAHcIFvGHLQEcg77j9yMpuaI5gGMF',
            popupOffsets: {
                top: [0, 0],
                bottom: [0, -70],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            },
            zoomValue: 5,
            apartmentServices:[
                'Condizionatore',
                
                'Parcheggio',
                
                'Palestra',
                
                'Wi-Fi',
                
                'Piscina',
                
                'Spa',
                
                'Balcone',
                
                'Lavatrice',
            ]
        }
    },
    methods: {
        async getApartments() {

                if (this.address) {
                    await axios.get(this.tomtom + this.address + this.tomtomKey)
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
                        // console.log('primo: ' + this.apartments);
                        // TODO: rivedere sincronia dei dati 
                        this.createMarker(this.apartments);
                    });
                
                if(this.map != undefined) {
                    this.mapDisplay();
                }
                
        },
        mapDisplay() {
            if(this.address != undefined) {
                this.zoomValue = 10;
            }
            this.map = tt.map({
            container: 'map-div',
            key: this.API_KEY,
            source: 'vector',
            center: [this.lon, this.lat],
            zoom: this.zoomValue,
            });
            this.map.addControl(new tt.FullscreenControl());
            this.map.addControl(new tt.NavigationControl());
            
            // this.map.flyTo({center: [this.lon, this.lat], zoom: 9});
        }, createMarker(array) {
            // console.log(this.apartments);
            array.forEach((el) => {
                let cor = [el.lon, el.lat];
                        
                let marker = new tt.Marker().setLngLat(cor).addTo(this.map);

                let popup = new tt.Popup({offset: this.popupOffsets}).setHTML(
                    `${el.name}`);
                marker.setPopup(popup);
            });

        },
        async getSponsored() {
            const res = await axios.get(this.apiSponsored);
            const data = await res.data.results;
            this.apartments = data;
            this.createMarker(this.apartments);
            console.log(this.apartments);
        }
    },
    created() {
        if(this.address != undefined) {
            this.getApartments();
        } else {
            this.getSponsored();
        }
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
        height: 12%;

        .input-lg{
            input{
                border: 1px solid rgb(107, 107, 107);
                width: 120px;
                margin: 0 15px;
            }

            @media (max-width: 1000px) {
                input{
                    max-width: 90px;
                }
            }
        }
    }

    .services{
        
        label {
            border-radius:40px;
            -webkit-font-smoothing: antialiased;
            text-align:center;
            background-color: white;
            transition: all 0.5s;
        }

        input[type=checkbox] {
            display: none;
        }

        input:checked + label {
            background-color: $bruschetta;
            color: white;
        }
    }

    .overflow-x{
        overflow-x: auto;
    }

    #dataUi_container{
        height: 88%;


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

    .background-gradient{
        background: linear-gradient(120deg, #57606f, #ff7f50, #ff6348);
    }

}
</style>