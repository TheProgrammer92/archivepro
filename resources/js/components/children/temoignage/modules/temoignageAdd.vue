<template>

    <b-container fluid class="row-add-temoignage ">


        <b-container >

            <b-row align-h="center" class="row-form-temoignage">

                <div class="row" style="text-align:center">

                    <div  class="w-100 form-temoignage-header-text" >


                        <h1 >Faire un temoignage</h1>

                        <h2>Temoignage for TheProgrammer</h2>
                    </div>

                    <b-row class="nav-form-temoignage w-100">
                            <nav>
                                <ul>

                                    <a  @click.prevent="changeCurrentAdd('personnel',isLien1)"  :class="{'router-link-active-reupdate':isRoute.isLien1}"> <li>Personnel</li></a>
                                    <a class="modal-trigger" href="#modal1"  @click.prevent="changeCurrentAdd('temoigner',isLien2)"  :class="{'router-link-active-reupdate':isRoute.isLien2}" > <li>  <i v-if="!isLien2" class="large material-icons">https</i>
                                        Nouveau Client</li></a>
                                    <a   @click.prevent="changeCurrentAdd('add_gestionnaire',isLien2)" :class="{'router-link-active-reupdate':isRoute.isLien3}" v-if="$auth.check(2)  || $auth.check(1)">

                                        <li>  <i v-if="!isLien3" class="large material-icons">https</i>
                                        Ajouter gestionnaire</li></a>

                                    </ul>
                            </nav>
                    </b-row>
                <keep-alive>


                    <component :is="currentAddComponent"></component>



                </keep-alive>
                </div>

            </b-row>


        </b-container>

    </b-container>





</template>

<script>

    import personnel from '../children/temoignageAdd/personnel'
    import temoigner from '../children/temoignageAdd/temoigner'
    import add_gestionnaire from '../children/temoignageAdd/add_gestionnaire'

    export default {
        name: "temoignageAdd",
        data() {

            return {

                isLien1:true,
                isLien2:false,
                isLien3:false,
                currentAddComponent:add_gestionnaire,


                isRoute: {
                    isLien1:true,
                    isLien2:false,
                    isLien3:false,
                }

            }
        },

        components: {
            personnel, temoigner,add_gestionnaire
        },

        methods: {

           changeCurrentAdd:function(currentAdd,linkEtat) {

               if( currentAdd==="personnel") {

                    this.isRoute.isLien1=true;
                    this.isRoute.isLien2=false;
                    this.isRoute.isLien3=false;
                   this.currentAddComponent =currentAdd
               }


               if( currentAdd ==="temoigner") {

                   this.isRoute.isLien1=false;
                   this.isRoute.isLien2=true;
                   this.isRoute.isLien3=false;
                   this.currentAddComponent =currentAdd
               }
               if( currentAdd ==="add_gestionnaire") {

                   this.isRoute.isLien1=false;
                   this.isRoute.isLien2=false;
                   this.isRoute.isLien3=true;
                   this.currentAddComponent =currentAdd
               }






           }
        },
        mounted() {


        }

    }
</script>

<style lang="scss" src="../../../../assets/sass/temoignage/temoignageAdd.scss"></style>
