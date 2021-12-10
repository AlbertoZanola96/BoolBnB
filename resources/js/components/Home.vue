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
                <!-- <div class="info-box-2 d-flex align-items-center p-3">
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
                </div> -->
            </div>
        </div>

        <!-- info box  -->
        <div class="info-box container-fluid">
            <div class="row">
                <div class="col">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="info-box-2 d-flex align-items-center p-4 flex-wrap flex-sm-nowrap justify-content-between">
                                <div>
                                    <i class="fas fa-circle mx-5"></i>
                                </div>

                                <div class="center mx-md-5 my-4 my-sm-0">
                                    <div class="info2-title">
                                        Vuoi il tuo appartamento in cima alla lista?
                                    </div>
                                    <div class="info2-description">
                                        Registrati e dai un'occhiata alle nostre sponsorizzazioni!
                                    </div>
                                </div>

                                <div>
                                    <button class="btn-home px-5 py-3">Registrati ora</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="wrapper">
                                <div class="center px-5">
                                    <div class="info-title">
                                        Pubblica annunci gratuitamente
                                    </div>
                                    <div class="info-description">
                                        Inserisci i tuoi annunci! Fatti trovare da chi sta cercando appartamenti.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appartamenti -->

        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h3 class="text-uppercase font-m">I nostri immobili sponsorizzati</h3>
                    <hr>
                </div>
            </div>
        </div>

        <div class="container-fluid p-4">
            <ul class="row mb-0">
                <li v-for="(apartment, index) in apartments" :key="index" class="col-12 col-md-6 p-3">
                    <div class="white-background p-3 overflow-hidden sponsor-card">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-6 d-flex align-items-center">
                                <img class="w-100" :src="'/storage/' + apartment.image" alt="">
                            </div>

                            <div class="col-12 col-lg-6 mt-3 mt-md-0 d-flex flex-column h-100 justify-content-between">
                                <div>
                                    <h2 class="m-0 text-overflow">{{ apartment.name }}</h2>
                                    <hr class="my-2">
                                    <h4 class="font-xxs gray-text text-overflow">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span class="ml-2">{{ apartment.address }}</span>
                                    </h4>
                                    <!-- services list  -->
                                    <ul id="services_list" class="d-none d-md-flex flex-wrap pl-0 py-2 pb-md-0 pb-lg-3 white-background">
                                        <!-- num_rooms  -->
                                        <li>
                                            <i class="fas fa-door-open font-xxs watermelon-text"></i>
                                            <span class="d-inline-block mx-1">{{ apartment.num_rooms }} camere</span> 
                                        </li>
                                        <li class="mx-3">|</li>
                                        <!-- num_beds  -->
                                        <li>
                                            <i class="fas fa-bed font-xxs watermelon-text"></i>
                                            <span class="d-inline-block mx-1">{{ apartment.num_beds }} letti</span>
                                        </li>
                                        <li class="mx-3">|</li>
                                        <!-- square meters  -->
                                        <li>
                                            <i class="fas fa-ruler-combined font-xxs watermelon-text"></i>
                                            <span class="d-inline-block mx-1">{{ apartment.square_meters }}mq</span>
                                        </li>
                                    </ul>

                                    <div>
                                        <hr class="mt-0 d-none d-lg-block">

                                        <div class="description-box d-none d-lg-block">
                                            <div>
                                                <p> {{ !(apartment.description.length > 150) ? apartment.description : apartment.description.substring(1, 150) + '...' }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <hr class="d-none d-md-block">
                                    <router-link target="_blank" :to="{ name: 'Show', params: {slug: apartment.slug, id: apartment.id} }">
                                        <button class="btn btn-primary w-100" >
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

        <!-- apartments  -->
        <!-- <div class="container-fluid">
            <div class="row my-3" v-for="(apartment, index) in apartments" :key="index">
                <div class="col-12 col-md-8 col-lg-6 mx-auto card">       
                    <img :src="'/storage/' + apartment.image" :alt="apartment.name ">
                    
                    <div class="row">
                        <div class="col-12">
                            <h3 class="ml-3">{{ apartment.name }}</h3>
                            <h4 class="ml-3 mt-3" style="display: inline"><i class="fas fa-map-marker-alt mr-2"></i>{{ apartment.city }}</h4>
                            <h5 class="" style="display: inline">{{ apartment.address }}</h5>
                            <p class="ml-3 mt-3">{{ apartment.description }}</p> -->

                            <!-- <a class="p-1" href="{{ route('admin.apartments.show', $apartment->slug) }}">
                                <button class="btn btn-dark my-btn "><i class="fas fa-info"></i></button>
                            </a>
                            <a class="p-1" href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                                <button class="btn btn-dark my-btn"><i class="fas fa-edit"></i></button>
                            </a>
                            <a class="p-1" href="{{ route('admin.apartments.sponsor', $apartment->slug) }}">
                                <button class="btn btn-dark my-btn"><i class="far fa-chart-bar"></i></button>
                            </a>
                            <a class="p-1" href="{{ route('admin.apartments.sponsor',  $apartment->slug) }}">
                                <button class="btn btn-dark my-btn"><i class="fas fa-gem"></i></button>
                            </a> -->
                            <!-- <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" style="display: inline" class=" m-1 deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger my-btn"><i class="fas fa-trash-alt"></i></button>
                            </form> -->
                        <!-- </div>
                    </div>
                </div>
                
            </div>
        </div> -->
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