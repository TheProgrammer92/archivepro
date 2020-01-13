<template>

    <div id="sidebarMenu">
        <div class="sidebarMenu-img-param pull-right sidebarOpenClose" @click="closeSidebar">
            <img src="img/icone/paramettre1.png" alt="" height="50" width="50">

        </div>


        <ul  class="sidebar-ul-list-item" v-if="openSidebar">


            <ul class="sidebar-list-item pull-left">


                <li>
                    <div>

                        <h4>Sidebar Color</h4>

                        <div class="listAtChange" v-responsive.lg.xl >


                            <div data-color="red"></div>
                            <div data-color="blue"></div>
                            <div data-color="green"></div>

                        </div>

                    </div>
                </li>

                <li>
                    <div class="sidebarActiveColor">
                        <h4>SideBar active Color </h4>

                        <div class="listAtChange">


                            <div data-color="red"></div>
                           <div data- color="blue"></div>
                            <div data-color="green"></div>

                        </div>
                    </div>
                </li>
                <li>
                    <div class="sideBarImage">
                        <h4>Sidebar Image</h4>

                        <div class="listAtChange">


                            <div data-color="red"></div>
                            <div data-color="blue"></div>
                            <div data-color="green"></div>

                        </div>
                    </div>
                </li>

            </ul>

        </ul>
    </div>

</template>

<script>
    import vueResponsive from 'vue-responsive';
    Vue.directive('responsive', vueResponsive)



    export  default {

        data() {
            return{
                openSidebar:true
            }
        },

        methods: {

            closeSidebar() {
               this.openSidebar=!this.openSidebar;
            }
        }

    }
</script>
