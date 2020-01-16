<template>

        <div  class="sidebar-image" >

                <div class="sidebar" >


                    <b-row  align-h="center" class="sidebar-header-first">


                        <div class="div_close_sidebar">

                            <img :src="pathLogo + 'logo.jpg' " alt="Logo" width="150" height="150">

                        </div>


                    </b-row>


                    <nav class="sidebar-nav">
                        <a href="" class="sidebar-header-replace-notify"> <img :src="pathIcone + 'no2.png'" class="img-other-header" alt="" width="25" height="25">Notification</a>
                        <router-link to="/" ><i class="small material-icons">home</i>Accueil</router-link>
                        <router-link :to="{ name: 'nouveau' }"  v-if="$auth.check(2) || $auth.check(1)  " >
                            <i class="large material-icons">insert_chart</i>
                            Nouvel archive </router-link>

                        <router-link :to="{ name: 'delivered' }"  v-if="$auth.check(2) || $auth.check(1)  || $auth.check(3)" >
                            <i class="large material-icons">insert_chart</i>
                            Retrait archive</router-link>


                            <a class="modal-trigger" href="#modal1" >
                                <i class="large material-icons">insert_chart</i>
                                Parametre</a>


                        <a href="https://discord.gg/zUgj3pp">
                            <i class="large material-icons">insert_chart</i>
                            Discord
                        </a>

                        <router-link  :to="{ name:'login' }"  v-if="!$auth.check()">
                            <i class="large material-icons">insert_chart</i>
                            Se connecter
                        </router-link>


                    </nav>
                </div>
            </div>

</template>
    <script>


        import getInfoUser from "./js/getInfoUser";

        export default{

            data(){

                return {

                    name:"",
                    sidebarNotClosed: true,
                    click:0

                }
            },
            mounted() {
                    //loading user info
                let app=this;
                 let promise = getInfoUser();

                promise.then(function (response) {

                    /*app.name = response.data.data.name;*/


                });


            },

           methods:{

                closeSidebar:function() {


                    //si la sidebar es ouverte

                    if (this.click%2===0){

                        $('.container-home').css('max-width','100%').css('float','none')


                        this.click++



                    }
                    else{
                        $('.container-home').css('max-width','100%').css('float','none')

                        this.click++



                    }

                    if(!this.$parent.openSidebar){


                        $('.sidebar').css('transform','translateX(500px)')


                    }

                    else{


                    }
                    this.$parent.closeSidebar()

                },

               resizeSidebar:function () {


                  if(window.innerWidth<=873){
                       this.$parent.openSidebar=false
                   }

                   else{

                      this.$parent.openSidebar=true
                   }
               }



           },

            updated(){
                window.onresize=this.resizeSidebar
            }
        }

    </script>

