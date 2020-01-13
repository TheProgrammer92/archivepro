<template>

        <header class="header-principal" >


            <div class="header-content-left pull-left" >


                <img :src='pathIcone + "point.png"' width="40"  alt="aucune" @click.prevent="closeSidebar" ><br>


            </div>
            <div class="header-content-right  pull-right">



                <ul class="header-content-right-ul">

                    <li>
                        <i class="small material-icons"  id="full-screen"  @click.prevent="full(this.document.documentElement)">fullscreen</i>


                    </li>

                    <li>
                        <i class="small material-icons img-other-header" data-dismiss="modal" data-toggle="modal" data-target="#modalNotify"  style="color:rgba(0,0,0,0.3)">notifications_none</i>
                    </li>



                    <li v-if="$auth.check()">


                        <img :src="this.user.avatar ==='' ? pathMiniatureUser +'user.jpg' : this.user.avatar " width="35" height="35" alt="profil" class="header-active-profil" style="margin-top: 15px;" @click="close()">

                        <h1>role = {{this.user.role}}</h1>
                        <!--div qui apparaittra au clique , pour l'edit du profil-->



                    </li>


                    <!---->
                    <transition name="lightSpeedIn">

                        <keep-alive>


                            <headerEditProfil  v-if="openProfil && $auth.check()" ></headerEditProfil>
                        </keep-alive>
                    </transition>


                </ul>




            </div>

            <div class="header-replace-right pull-right"  >

                <img :src='pathIcone + "images.png"' alt="" height="40" width="40" @click.prevent="closeSidebar"  class="closeSidebar">

            </div>

            <i class="tiny material-icons" style="position:absolute;right: 0;bottom: 0;" @click="resizeHeader">remove_red_eye</i>



        </header>

</template>

<script>

    import headerEditProfil from './headerEditProfil';

   /* import pathIcon from "./js/helpers/pathImg"*/

    export default {

        data() {

            return {

                openProfil: false,
                prenom:"TheProgrammer",
                clickSidebar:0,
                height:0,
                width:0,
                clickResizeHeader:0





            }


        },


        methods: {

            close: function () {

                this.openProfil = true;


            },
            closeSidebar: function () {


                this.$parent.openSidebar = !this.$parent.openSidebar;

                $('.container-home').css('float', 'right').css('width', '100%');


                this.$parent.sidebarPosition = "responsive";
                this.clickSidebar--;
                /*$('.container-home').css('max-width','calc(100% - 280px)').css('float','unset')*/

            },

            resizeHeader: function () {

                if (this.clickResizeHeader === 0) {

                    $('.header-principal').animate({'height': '30px'}, 800)
                    this.clickResizeHeader++;
                }

                else {
                    $('.header-principal').animate({'height': '50px'}, 800)
                    this.clickResizeHeader--

                }

            },


            full: function (element) {

                if (!document.fullscreenElement) {
                    return (element.requestFullscreen ||
                        element.webkitRequestFullscreen ||
                        element.mozRequestFullScreen ||
                        element.msRequestFullscreen).call(element);

                }
                else {


                    return (document.exitFullscreen ||
                        document.webkitExitFullscreen ||
                        document.mozExitFullscreen||
                        document.msExitFullscreen).call(document);
                }


            }

        }

        ,
        components  : { headerEditProfil},

        mounted(){
            let bouton = document.getElementById('full-screen');
            let app = this;


            this.getInfo()


        },

        updated() {

            this.getInfo()
        }


    }
</script>
<style>

    .lightSpeedIn-enter-active {
        animation: lightSpeedIn .5s;
    }
    .lightSpeedIn-leave-active {
        animation: lightSpeedOut .5s;
    }


</style>
<style lang="scss" src="../../assets/sass/global/_header_principal.scss"></style>
