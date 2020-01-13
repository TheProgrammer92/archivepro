<template>
<!--//  global component for show temoignage-->
    <div class="row row-show-temoignage">

        <router-view name="temongnage-modal-add"></router-view>

        <modal-temoignage></modal-temoignage>

        <b-row align-h="center" class="header-show">

            <b-container>

                <b-row align-h="center">


                    <b-col sm="12" cols="12"  lg="7" xl="7" order="1"	order-lg="2" order-xl="2" >

                        <div class="title">
                            <h1>TEMOIGNAGE</h1>

                        </div>

                        <br>

                        <div class="name">

                            <h1>TheProgrammer (Nguimatio)</h1>
                            <h2>TheProgrammer Temoignage</h2>
                        </div>


                    </b-col>


                </b-row>




            </b-container>

        </b-row>
        <br>

        <header-show-temoignage></header-show-temoignage>
        <b-container class="show-temoignage">

                <transition name='temoignage' >

                    <keep-alive>

                      <router-view></router-view>
                    </keep-alive>

                </transition>






        </b-container>


        <b-row class="background-end"></b-row>

        <temoignage-show-selected v-if="isOpenTemoignageSelected && infoTemoignage!== null && infoUser!==null"   :infoTemoignage="infoTemoignage" :infoUser="infoUser" ></temoignage-show-selected>

    </div>
</template>

<script>

    import headerShowTemoignage from './../children/headerShowTemoignage';
    import temoignageShowSelected from './temoignageShowSelected'
    import modalTemoignage from "./../../small-components/modal/modalTemoignage"


    export default {
        name: "showTemoignage",

        data () {

            return {
                infoTemoignage: {
                    avatar:'',
                    name:'',
                    temoignageText:'',
                },

                infoUser: {

                },
                isOpenTemoignageSelected:false,


            }
        },


        components: {
            headerShowTemoignage,
            temoignageShowSelected,
            modalTemoignage
        },

        methods: {


            openTemoignageSelected:function (){

                this.isOpenTemoignageSelected=!this.isOpenTemoignageSelected;
            }

        },

    }
</script>

<style>

   .temoignage-enter-active {

        animation: jackInTheBox .5s;
    }
    .temoignage-enter {
        animation: jackInTheBox .5s ;

    }



</style>

<style lang="scss" src="../../../../assets/sass/temoignage/showTemoignage.scss" scoped></style>
