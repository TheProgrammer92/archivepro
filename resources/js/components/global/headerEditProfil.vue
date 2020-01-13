<template>

    <div class="header-sidebar  ">
        {{name}}

        <b-row class="header-sidebar-avatar" align-h="center">

            <img :src="user.avatar" class="header-profil"  alt="profil" @click.prevent="close" >

        </b-row>


        <b-row class="header-sidebar-menu" align-h="center">

            <router-link :to="{name:'profil'}">  <i class="small material-icons">person</i>
                  Mon Compte  </router-link>

            <a href="">  <i class="small material-icons">featured_video</i>  Video suivies</a>
            <a href="">   <i class="small material-icons">accessibility</i>    Mes Interventions</a>

            <a v-if="$auth.check()"  @click.prevent="$auth.logout()"  class="logout">   <i class="small material-icons">close</i>  Deconnexion</a>



        </b-row>



    </div>


</template>

<script>
    import getInfoUser from "./js/getInfoUser";

    export default {

        data() {
            return{
                name :""
            }
        }
        ,

        methods: {

          close:function () {

              this.$parent.openProfil = !this.$parent.openProfil;
          }
        },

         created() {

            //loading user info


            let app=this;
            let promise = getInfoUser();

            promise.then(function (response) {

                app.name = response.data.data.name;
                console.log(response.data.data)


            })
                .catch(e => {

                    console.log("Error 404")
                });
             this.getInfo()
        },


    }
</script>


<style lang="scss" src="../../assets/sass/global/children/header_sidebar.scss">

</style>

