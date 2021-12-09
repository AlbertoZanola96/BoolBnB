<template>
    <div>
        <div id="show_container">
        <div class="container my-4">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-secondary shadow" href=""><span>&#8592;</span> Torna alla ricerca</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="p-4 white-background shadow">
                        <div class="d-flex item-align-end">
                            <i class="fas fa-home font-m"></i>
                            <h1 class="font-ml mb-0 ml-3 gray-text">{{ apartment.name }}</h1>
                        </div>
                        <hr class="d-none d-md-block">
                        <div class="d-none d-md-inline-block">
                            <ul class="font-xxs d-flex p-0">
                                <li>
                                    <i class="fas fa-map-marker-alt font-xxs"></i>
                                    <span>{{ apartment.address }}</span>
                                </li>
                                <li class="mx-3">|</li>
                                <li>
                                    <i class="fas fa-door-open font-xxs"></i>
                                    <span>{{ apartment.num_rooms }} camere</span>
                                </li>
                                <li class="mx-3">|</li>
                                <li>
                                    <i class="fas fa-bed font-xxs"></i>
                                    <span>{{ apartment.num_beds }} letti</span>
                                </li>
                                <li class="mx-3">|</li>
                                <li>
                                    <i class="fas fa-ruler-combined font-xxs"></i>
                                    <span>{{ apartment.square_meters }} mq</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="my-5">
                        <img class="w-100 shadow" src="https://www.lignius.it/fileadmin/_processed_/b/8/csm_suedtirolhaus_MirrorHouses_5cbac.0_a556da6959.jpg" alt="">
                    </div> 

                    <div class="d-flex justify-content-between align-items-start container-fluid">
                        <div class="row row-cols-1 row-cols-lg-2 justify-content-between">
                            <div class="col pr-lg-3 p-0">
                                <div class="white-background p-4 shadow">
                                    <h2 class="mb-4 font-sm">Caratteristiche immobile:</h2>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="darkgray-text">Numero stanze: {{ apartment.num_rooms }} </span>
                                            <span></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="darkgray-text">Numero letti: {{ apartment.num_beds }} </span>
                                            <span></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="darkgray-text">Numero bagni: {{ apartment.num_bathrooms }} </span>
                                            <span></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="darkgray-text">Metri quadrati: {{ apartment.square_meters }}</span>
                                            <span>mq</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="darkgray-text">Indirizzo: {{ apartment.address }}</span>
                                            <span></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col pl-lg-3 pt-5 pt-lg-0 p-0">
                                <div class="white-background p-4 shadow">
                                    <h2 class="font-sm mb-4">Servizi dell'immobile:</h2>
                
                                    <ul class="d-flex p-0 info-container services-list flex-wrap">
                                        <li v-for="(service, index) in apartmentServices" :key="index">
                                            <span>{{ service.name }}</span>
                                        </li>
                                    </ul>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div> 

                <div class="col-12 col-md-4 pt-4 px-4">
                    <div class="sticky-top pt-4">
                        <div class="white-background p-4 text-center rounded border mb-4 shadow">
                            <h3 class="font-sm py-4 text-dark">Vuoi maggiori informazioni?</h3>
                            <h4 class="font-xs text-dark"> 
                                Contatta direttamente il proprietario di
                                <span class="gray-text">"{{ apartment.name }}"</span>
                                !
                             </h4>
                        </div>

                        <ul class="list-group shadow">
                            <li class="list-group-item list-group-item-action">
                                <a href="" data-toggle="modal" data-target="#leads" data-backdrop="true" class="btn btn-primary w-100">
                                    Invia un messaggio
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="white-background p-4 my-5 shadow">
                        <h2 class="font-m">Descrizione:</h2>
                        <hr>
                        <p>{{ apartment.description }}</p>
                    </div>  
                </div> 
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="white-background p-4 shadow mb-5">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt font-m"></i>
                            <h2 class="font-m mx-3 mb-0">Indirizzo immobile:</h2>
                        </div>
                        <hr>
                        <p><span><i class="fas fa-map-pin font-xxs mr-4"></i>{{ apartment.address }}</span></p>
                        <hr>
                        <div class="w-100">
                            <div id="map-div"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- message modal  -->
    <div class="modal fade" id="leads" data-backdrop="true" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="mt-2 d-flex justify-content-center align-items-end">
                    <h3 class="modal-title text-white" id="staticBackdropLabel">Invia messaggio</h3>
                </div>
                <button type="button" class="close text-white position-absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <!-- input nascosti per prendere id e slug  -->
                    <input name="apartment_id" id="apartment_id" type="hidden" value="">
                    <input name="slug" id="slug" type="hidden" value="">

                    <!-- name -->
                    <div class="form-group row">
                        <label for="name" class="text-white col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                            <input v-model="nameMessage" placeholder="Insert your name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    
                    <!-- email -->
                    <div class="form-group row">
                        <label for="email" class="text-white col-md-4 col-form-label text-md-right">E-Mail Address</label>

                        <div class="col-md-6">
                            <input v-model="emailMessage" placeholder="Insert E-Mail Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">
                        </div>
                    </div>

                    <!-- messaggio -->
                    <div class="form-group row">
                        <label for="message" class="text-white col-md-4 col-form-label text-md-right">Message</label>

                        <div class="col-md-6">
                            <textarea v-model="message" placeholder="Insert message" name="message" id="message" cols="30" rows="5" class="form-control @error('message') is-invalid @enderror" required autocomplete="message"></textarea>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <!-- send message button -->
                            <button type="button" v-on:click="sendLeadData" class="modalbtn">
                                Send message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'Show',
    data() {
        return {
            apiIpAddressIdApartment: 'http://127.0.0.1:8000/api/clicks?',
            apiSingleApartment: 'http://127.0.0.1:8000/api/apartment?',
            apiLead: 'http://127.0.0.1:8000/api/send-message?',
            ip_address: '',
            apartment_id: '',
            apartment: '',
            apartmentServices: [],
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
            nameMessage: '',
            emailMessage: '',
            message: '',
        }
    }, 
    methods: {
        async getClicks() {
            const response = await fetch('http://api.ipify.org/?format=json');
            const data = await response.json();
            this.ip_address = data.ip;
            this.apartment_id = this.$route.params.id;
    
                // console.log(this.apartment_id);
                // console.log(this.ip_address);
    
            if(this.apartment_id != undefined) {
                axios.post(
                    this.apiIpAddressIdApartment + "ip_address=" + this.ip_address + "&apartment_id=" + this.apartment_id
                );
            }
        },
        async getApartment() {
            const res = await axios.get(this.apiSingleApartment + 'apartment_slug=' + this.$route.params.slug);
            const data = await res.data.results;
            // console.log(res.data);
            this.apartment = data;
            this.apartmentServices = res.data.services;
            console.log(data);
            this.mapDisplay(this.apartment);
                
        },
        mapDisplay(array) {
            this.map = tt.map({
            container: 'map-div',
            key: this.API_KEY,
            source: 'vector',
            center: [array.lon , array.lat],
            zoom: 10,
            });
            this.map.addControl(new tt.FullscreenControl());
            this.map.addControl(new tt.NavigationControl());
            this.createMarker(array);
        },
        createMarker(array) {
            let cor = [array.lon, array.lat];
            let marker = new tt.Marker().setLngLat(cor).addTo(this.map);

            let popup = new tt.Popup({offset: this.popupOffsets}).setHTML(
                    `${array.address}`);
            marker.setPopup(popup);
            // console.log(data);  
        },
        sendLeadData() {
            if(this.apartment_id != undefined) {
                axios.post(
                    this.apiLead + "apartment_id=" + this.apartment_id + "&name=" + this.nameMessage + "&email=" + this.emailMessage + "&message=" + this.message
                );
            }
            
            this.$router.push({ name: 'Success', params: {slug: this.apartment.slug, id: this.apartment_id} });
        }
    },
    created() {
        this.getClicks();
        this.getApartment();
    },
}
</script>

<style lang="scss" scoped>

#map-div{
    width: 100%;
    height: 400px;
}
</style>