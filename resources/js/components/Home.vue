<template>
    <div>
        <!-- Banner  -->
        <div class=" container-fluid banner d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="layover col"></div>
    
                <!-- input search -->
                <div class="home-search text-center col-10 col-md-6 col-lg-4">
                    <label for="search">Cerca qui l'appartamento ideale per te</label>

                    <input 
                    v-model="inputSearch"
                    id="search"
                    type="text" 
                    placeholder="Inserisci una città o un indirizzo" class="text-center"
                    v-on:keyup.enter="linkSearch"
                    >
                </div>

                <!-- info box 2  -->
                <div class="info-box-2 d-flex align-items-center p-3">
                    <div>
                        <i class="fas fa-circle mx-5"></i>
                    </div>

                    <div class="center">
                        <div class="info2-title">
                            Vuoi il tuo appartamento in cima alla lista?
                        </div>
                        <div class="info2-description">
                            Registrati e dai un'occhiata alle nostre sponsorizzazioni!
                        </div>
                    </div>

                    <div>
                        <button class="btn-home">Registrati ora</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- info box  -->
        <div class="info-box container-fluid">
            <div class="row">
                <div class="col-12 info-title">
                    Pubblica annunci gratuitamente
                </div>
                <div class="row">
                    <div class="col-12 info-description">
                        Inserisci i tuoi annunci! Fatti trovare da chi sta cercando appartamenti.
                    </div>
                </div>
            </div>  
        </div>

        <!-- section title -->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h3 class="text-uppercase font-m">I nostri immobili sponsorizzati</h3>
                    <hr>
                </div>
            </div>
        </div>

        <!-- appartamenti sponsorizzati  -->
        <div class="container-fluid p-4">
            <ul class="row mb-0">
                <li v-for="(apartment, index) in apartments" :key="index" class="col-12 col-md-6 p-3">
                    <div class="white-background overflow-hidden sponsor-card">
                        <div class="row w-100 ml-0 align-items-center">
                            <div class="col-12 col-xl-6 d-flex align-items-center">
                                <img class="w-100" :src="'/storage/' + apartment.image" alt="">
                            </div>

                            <div class="col-12 col-xl-6 py-3 py-xl-3 mt-3 mt-md-0 d-flex flex-column h-100 justify-content-between">
                                <div>
                                    <h2 class="m-0 text-overflow">{{ apartment.name }}</h2>
                                    <hr class="my-2">
                                    <h4 class="font-xxs gray-text text-overflow">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span class="ml-2">{{ apartment.address }}</span>
                                    </h4>
                                    <!-- services list  -->
                                    <ul id="services_list" class="d-none d-md-flex flex-wrap pl-0 py-2 pb-md-0 pb-xl-3 white-background">
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

                                    <div>
                                        <hr class="mt-0 d-none d-xl-block">

                                        <div class="description-box d-none d-xl-block">
                                            <div>
                                                <p> {{ !(apartment.description.length > 150) ? apartment.description : apartment.description.substring(1, 150) + '...' }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <hr class="d-none d-md-block">
                                    <router-link :to="{ name: 'Show', params: {slug: apartment.slug, id: apartment.id} }">
                                        <button class="btn blue-background w-100 text-white" >
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
    </div>
</template>

<script>
export default {
    name: 'Home',
    data() {
        return {
            apiSponsored: 'http://127.0.0.1:8000/api/sponsored?',
            apartments: [],
            inputSearch: ''
        }
    },
    methods: {
        async getSponsored() {
            const res = await axios.get(this.apiSponsored);
            const data = await res.data.results;
            this.apartments = data;
            console.log(this.apartments);
        },
        linkSearch() {
            this.$router.push({ name: 'Search', params: { inputSearch: this.inputSearch } })
        }
    },
    created() {
        this.getSponsored();
    }
}
</script>

<style lang="scss" scoped>
    
</style>