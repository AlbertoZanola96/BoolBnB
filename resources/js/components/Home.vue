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
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 apartments">
                    dsadsadsa
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
            inputSearch: ''
        }
    },
    methods: {
        linkSearch() {
            this.$router.push({ name: 'Search', params: { inputSearch: this.inputSearch } })
        }
    }
}
</script>

<style lang="scss" scoped>

</style>