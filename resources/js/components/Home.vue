<template>
    <div>
        <!-- Banner  -->
        <div class=" container-fluid banner d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="layover col"></div>
    
                <!-- input search -->
                <div class="home-search text-center">
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
                    <i class="fas fa-circle mx-5"></i>

                    <div class="center">
                        <div class="info2-title">
                            Vuoi il tuo appartamento in cima alla lista?
                        </div>
                        <div class="info2-description">
                            Registrati e dai un'occhiata alle nostre sponsorizzazioni!
                        </div>
                    </div>

                    <button class="btn-home">Registrati ora</button>
                </div>
            </div>
        </div>

        <!-- info box  -->
        <div class="info-box container-fluid">
            <div class="row">
                <div class="col">
                    <div class="wrapper p-3">
                        <div class="center">
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

        <!-- apartments  -->
        <div class="container-fluid">
            <div class="row my-3" v-for="(apartment, index) in apartments" :key="index">
                <div class="col-12 col-md-8 col-lg-6 mx-auto card">       
                    <img :src="'/storage/' + apartment.image" :alt="apartment.name ">
                    
                    <div class="row">
                        <div class="col-12">
                            <h3 class="ml-3">{{ apartment.name }}</h3>
                            <h4 class="ml-3 mt-3" style="display: inline"><i class="fas fa-map-marker-alt mr-2"></i>{{ apartment.city }}</h4>
                            <h5 class="" style="display: inline">{{ apartment.address }}</h5>
                            <p class="ml-3 mt-3">{{ apartment.description }}</p>
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
                        </div>
                    </div>
                </div>
                
            </div>
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