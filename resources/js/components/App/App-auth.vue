<template>

    <div>

        <sidebar-component></sidebar-component>

        <b-row class="w-100 " align-h="center" >

            <div class="alert-add-code" v-if="isShowCode">
                Bonjour Votre Code est : {{  code }}
            </div>


        </b-row>
        <div class="sidebar-auth float-right fixed"  >


            <b-row align-v="center" align-h="center" class="row-auth" >

                <router-view></router-view>
            </b-row>


        </div>


    </div>


</template>

<script>

    import sidebarComponent from '../../components/global/SidebarComponent.vue'
    export default {
        name: "app-auth",
        data(){

            return {

                code:'',
                isShowCode:false
            }
        },

        methods: {

            showCode:function(code) {
                this.code=code;
                this.isShowCode=true;
                let app  = this;
                setInterval(function () {

                    app.isShowCode=false;
                },10000)
            }

        },
        components:{
            sidebarComponent
        },

        mounted(){

            console.log('chargement de limage')


        },


        beforeRouteLeave(to , from , next){

            $('body').css('background','#eee').css('background-image','unset');


            next()

        },

        updated() {


        },

        beforeRouteEnter(to ,from, next) {

            $(function () {

                $('body').css('background','url(https://courierpro.local/images/images/logo4.jpg) center center /cover  ')


            });

            next()
        }

    }
</script>

<style lang="scss" src="../../assets/sass/App/App_auth.scss"></style>
