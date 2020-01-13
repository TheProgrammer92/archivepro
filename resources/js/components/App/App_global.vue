<template>

        <!--sidebar-->
        <div >

        <sidebar-home v-if="openSidebar" ></sidebar-home >


            <header-home></header-home>


            <b-container class="container-home"  v-if="$auth.ready()" >

                <!-- Button trigger modal -->
                <modal-notify></modal-notify>

                <!--rooter-->
                <toast-show :code="3234"></toast-show>


                     <transition name="fade" >


                            <router-view  ></router-view>

                     </transition>

                <!--footer global-->
                <!--<footer-home></footer-home>-->

                <modal-temoignage></modal-temoignage>
            </b-container>

            <messagerie v-if="$auth.check()"></messagerie>

        </div>

</template>

<script>
    import headerHome from '../global/headerComponent.vue'
    import sidebarHome from '../global/SidebarComponent.vue'
    import footerHome from '../global/footerComponent.vue'
    import home from '../master/Home.vue'
    import messagerie from '../master/messagerie.vue'
    import modalTemoignage from '../children/small-components/modal/modalTemoignage'
    import toastShow from '../children/small-components/modal/toast-show'

    import modalNotify from '../children/notification/modal-notify'

    export default {
        data() {
            return {

                openSidebar:true,
                sidebarPosition:"",
                height:0,
                width:0

            }
        } ,

        components:{
            headerHome, sidebarHome, footerHome,home, messagerie,modalTemoignage ,toastShow,modalNotify
        },

        methods: {

            changeSidebarPosition:function() {


                this.sidebarPosition="responsive";
            },

            closeSidebar:function () {
                this.openSidebar=!this.openSidebar;
            },

            resize:function () {

                if (window.innerWidth<1220){



                    this.width=window.innerWidth;


                }

                this.width=window.innerWidth;
                this.height=window.innerHeight;



            }
        },



    }
</script>




<style lang="scss">

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }


</style>
<style lang="scss" src="../../assets/sass/App/App_global.scss"></style>
