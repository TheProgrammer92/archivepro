<template>


    <b-container fluid>




        <transition name="fade" appear  v-if="$auth.ready() && loader">

            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </transition>

        <loader v-if="!loader"></loader>


    </b-container>



</template>

<script>

    import loader from "./components/children/small-components/loader/loader"

    export default {
        name: "App-global",

        data() {

          return {

              loader:false
          }
        },

        mounted() {

            let _this=this;

          setTimeout(function () {


              _this.loader=true;


          },10)
        },

        components: {loader}
    }
</script>


<style>

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>


<style lang="scss" src="./assets/sass/app.scss"></style>
