<template>


    <b-row  align-h="center" class="row-main-global w-100" >

        <operation-courriel   v-if="isOperateArchive" ></operation-courriel>
      <router-link to="/nouveau">

      <main class="main">



            <b-row class="help-show-note">

                <i class="material-icons Medium">add_circle_outline</i>

               <span class="text-add-he">     Cliquer ici pour Ajouter une archive</span>
            </b-row>



            <show-courrier :is-show-btn-date="true"></show-courrier>



        </main>

      </router-link>
    </b-row>

</template>


<script>
    import OperationCourriel from "../children/OperationCourriel/Operation-courriel"

    import MainHomeComponent from '../children/home/modules/MainHomeComponent.vue'
    import MainRecentProjet from '../children/home/modules/MainRecentProjet.vue'
    import HomeRealisationComponent from '../children/home/modules/HomeRealisationComponent.vue'
    import MainFirstHome from '../children/home/modules/MainFirstHome.vue'
    import CarousselHome from '../children/home/modules/CarousselHome.vue'
    import modalTemoignage from '../children/small-components/modal/modalTemoignage'

     import showCourrier from '../children/utils/show-courrier'
    import courrierThisDay from '../children/home/component/courrierThisDay'

    //date
    //for date
    import * as moment from 'moment';
    import 'moment/locale/pt-br';

    import {mapActions, mapGetters} from "vuex";

    export  default {
        data() {

            return {


                valueBtnDate:[],
                count:0,
                tab_expediteur: [],
                tab_destinataire: []



            }
        },
        components: {
            MainHomeComponent,
            MainRecentProjet,
            HomeRealisationComponent,
            MainFirstHome,
            CarousselHome,
            modalTemoignage,
            courrierThisDay,
            showCourrier,
            OperationCourriel

        },
        mounted() {

            this.getAllArchive()

        },

        computed:{
            ...mapGetters('archive' , [
                'tabService',
                'tabCategorie',
                'tabArchive',
                'isOperateArchive'
            ])
        },

        methods: {
            ...mapActions('archive', [

                'getAllArchive'
            ]),

            //gestion de la date affiché sur le button
            getDate:function (element,cle) {

                let date =moment(element.created_at, "YYYY-MM-DD HH:mm").format('LL');
                let aujourdhui =new Date();

                let aMoment = moment(aujourdhui, "YYYY-MM-DD HH:mm").format('LL');
                if (date === aMoment && this.count ===0)  {

                    this.valueBtnDate[cle]="aujourd'hui"
                    this.count++;


                    return true;

                }



                return true;






            }
        },

    }
</script>
<style lang="scss" src="../../assets/sass/home/home.scss" >
</style>
