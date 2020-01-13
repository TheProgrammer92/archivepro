<template>

    <b-container fluid class="show-selected">




        <b-row class="header-show-selected" >


            <b-container>

                <b-row>

                    <i class="small material-icons" @click.prevent="closeTemoignage">arrow_back</i>


                </b-row>

            </b-container>

        </b-row>
        <br>
        <b-container >

            <b-row class="row-affiche-selected">
                <b-col cols="2" class="profil-img">

                    <img :src="pathUserImg + infoUser.avatar" alt="image temoignage">

                </b-col>

                <b-col cols="9" >
                        <b-row class="selected-info">


                                <h1>{{infoUser.name}}</h1>
                                <h2>Age 32</h2>




                            <b-row class="text-temoignage">

                                {{infoTemoignage.temoignage}}

                            </b-row>
                        </b-row>

                </b-col>
            </b-row>
        </b-container>

    </b-container>

</template>

<script>
    export default {
        name: "temoignageShowSelected",

        props: {

          infoTemoignage:Object,
          infoUser:Object

        },

        methods:{

            closeTemoignage: function() {
                $('body').css('overflow-y','auto')
                this.$parent.openTemoignageSelected()
            }
        },


    }
</script>

<style lang="scss" src="../../../../assets/sass/temoignage/temoignageShowSelected.scss"></style>
