<template>


    <b-row  class="operate-global-courriel" align-h="center" align-v="start"  >


       <span  ><i class=" material-icons icon-close" @click.prevent="showOperateArchive">close</i></span>

        <h1>Etats De l'archive</h1>


       <b-row align-h="center" class="w-100 div-state-courriel" v-for="(element,index) in tabOperateArchive" :key="index">


           <b-row class="w-100 state-courriel" align-h="center">
               <b-col>Modifier l'archive</b-col>

               <b-col>
                   <div class="switch">
                       <label>
                           <input v-if="element.etat===0"  type="checkbox" :value="element.etat" v-model="checkNames">
                           <input v-if="element.etat===1" checked  type="checkbox" v-model="checkNames">
                           <span class="lever"></span>

                       </label>


                   </div></b-col>

           </b-row>


           <button @click.prevent="beginOperate(element)" class="btn waves-effect waves-light btn-submit-operate" type="submit" name="action">Valider
               <i class="material-icons right">send</i>
           </button>
       </b-row>


    </b-row>
</template>

<script>

    import {mapGetters,mapActions} from "vuex"

    export default {
        name: "Operation" ,

        props: {

            tabOperateTransformed:Array,
            thisActuel: Object
        },
        data() {

            return {

                valide:1,
                inValide:0,
                isShowOperate:false,
                checkNames: [],
                url: "courrier/"


            }
        },

        computed: {

            ...mapGetters('archive' , [

                'tabOperateArchive'
            ])
        },


        methods: {

            ...mapActions('archive' , [
                'archiveModifystate'
                ,'showOperateArchive'
            ]),

            beginOperate:function(value) {

                this.checkNames.forEach(element => {


                    this.url = "courrier/";

                    if (element === 0) {


                        element =1;

                    }
                    else {

                        element =0;
                    }


                    let elements= {
                        id:value.id,
                        value:element
                    };

                    this.operate(elements,this.url)
                })


            },

            operate:function(element,url) {

                console.log(element)

                this.archiveModifystate(element)



            },






        },



    }
</script>

<style scoped lang="scss" src="../../../assets/sass/OperationCourriel/Operation-courriel.scss"></style>
