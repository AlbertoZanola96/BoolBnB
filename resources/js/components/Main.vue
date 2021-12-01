<template>
<div id="search-container">
    <section id="input_container" class="container-fluid border-bottom">
        <div class="row align-items-center h-100 align-items-center">
            <div class="col-12">
                <form action="" class="d-flex px-2">
                    <div class="input-group justify-content-center align-items-center">
                        <div>
                            <input class="btn" id="num_rooms" name="num_rooms" type="number" min="0" max="10" placeholder="N. camere">
                        </div>

                        <div>
                            <input class="btn" id="num_beds" name="num_beds" type="number" min="0" max="10" placeholder="N. letti">
                        </div>

                        <div>
                            <input class="btn" id="num_bathrooms" name="num_bathrooms" type="number" min="0" max="10" placeholder="N. bagni">
                        </div>

                        <div>
                            <input type="text" class="btn" id="address" name="address" placeholder="In quale città?">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Inizia a cercare
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

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
                                <div>
                                    <h2>{{ apartment.name }}</h2>
                                    <hr class="m-0 d-none d-lg-block">
                                </div>

                                <ul id="services_list" class="d-none d-lg-flex flex-wrap p-0">
                                    <li>
                                        <i class="fas fa-door-open font-xxs"></i>
                                        <span class="d-inline-block mx-1">{{ apartment.num_rooms }} camere</span> 
                                    </li>
                                    <li class="mx-3">|</li>
                                    <li>
                                        <i class="fas fa-bed font-xxs"></i>
                                        <span class="d-inline-block mx-1">{{ apartment.num_beds }} letti</span>
                                    </li>
                                    <li class="mx-3">|</li>
                                    <li>
                                        <i class="fas fa-ruler-combined font-xxs"></i>
                                        <span class="d-inline-block mx-1">{{ apartment.square_meters }}mq</span>
                                    </li>
                                </ul>

                                <div class="pt-2">
                                    <a href="">
                                        <button class="btn btn-primary">
                                            Visualizza immobile &#8594;
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-7 col-lg-6 p-0 box-img">
                <img src="https://miro.medium.com/max/1400/1*qYUvh-EtES8dtgKiBRiLsA.png" alt="">
            </div>
        </div>
    </section>
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
        // saveId:function(e){
        //     let apartment_id = e.target.id;
        //     console.log(e.target.id);
        // }
    },
    created() {
        this.getAppartments();
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/_variables";

#search-container{
    height:100vh;
    
    #input_container{
        height: 6%;

        input{
            border: 1px solid rgb(107, 107, 107);
            min-width: 100px;
            margin: 0 15px;
        }
    }

    #dataUi_container{
        height: 94%;


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


                img{
                    object-fit: cover;
                    width: 100%;
                    height: 100%;
                }
            }
            
        }
    }

}
</style>