<template>

    <b-row class="familly-temoignage" align-h="center">

        <b-row class="w-25 row-card-temoignage" v-for="(temoignage ,index) in tabTemoignage[0]"   :key="temoignage.id">




            <div class="col s12  m4 l2" >

                <div class="card" @click.prevent="openTemoignage(index)">

                    <div class="card-image">

                        <!--image  users-->

                        <img :src="pathUserImg +  tabUser[0][index].avatar">

                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p> {{ temoignage.temoignage}}</p>
                    </div>
                </div>
            </div>
        </b-row>



    </b-row>
</template>

<script>

    export default {
        name: "afficheTemoignage",
         props: {

            tabUser:Array,
             tabTemoignage:Array
         },

        methods: {


            openTemoignage: function(index) {

                this.$parent.$parent.infoTemoignage=this.tabTemoignage[0][index];
                this.$parent.$parent.infoUser=this.tabUser[0][index];
                this.$parent.$parent.openTemoignageSelected();



            },

        },

        mounted() {

            console.log("affiche")
            console.log(this)
        }



    }
</script>

<style scoped>


    @media screen and (max-width:976px) {

        .row-card-temoignage {

            width:50% !important;

        }

    }

    @media screen and (max-width: 364px) {

        .row-card-temoignage {

            width: 100% !important;
        }
    }


    @media screen and (max-width:296px) {
        .row-card-temoignage {

            width: 25% !important;
        }

    }
</style>
