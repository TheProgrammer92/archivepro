<template>


    <b-row  class="operate-global-courriel" align-h="center" align-v="start"  >


       <span  ><i class=" material-icons icon-close" @click.prevent="showOperateCourriel">close</i></span>

        <h1>Etats Du courrier</h1>
       <b-row align-h="center" class="w-100 div-state-courriel" v-for="(element,index) in tabOperateTransformed" :key="index">


           <b-row class="w-100 state-courriel" align-h="center">
               <b-col>Courrier en attente</b-col>

               <b-col>
                   <div class="switch">
                       <label>
                           <input v-if="element.isAttending===inValide"  type="checkbox" value="isAttending" v-model="checkNames">
                           <input v-if="element.isAttending===valide" checked  type="checkbox">
                           <span class="lever"></span>

                       </label>


                   </div></b-col>

           </b-row>
           <b-row class="w-100 state-courriel">
               <b-col>Courrier en Envoyé</b-col>

               <b-col>
                   <div class="switch">
                       <label>
                           <input  v-if="element.isSend===inValide" type="checkbox" value="isSend"  v-model="checkNames">
                           <input v-if="element.isLost===valide" checked type="checkbox" >

                           <span class="lever"></span>

                       </label>


                   </div></b-col>

           </b-row>
           <b-row class="w-100 state-courriel">
               <b-col>Courrier en Perdu</b-col>

               <b-col>
                   <div class="switch">
                       <label>
                           <input v-if="element.isLost===inValide"  type="checkbox" value="isLost" v-model="checkNames">
                           <input v-if="element.isLost===valide" checked type="checkbox" >
                           <span class="lever"></span>

                       </label>


                   </div></b-col>

           </b-row>

           <b-row class="w-100 state-courriel">
               <b-col>Courrier en Delivré</b-col>

               <b-col>
                   <div class="switch">
                       <label>
                           <input v-if="element.delivered===inValide" type="checkbox" value="delivered" v-model="checkNames">
                           <input v-if="element.delivered===valide" type="checkbox" value="delivered" checked>
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


        methods: {

            beginOperate:function(value) {




                this.checkNames.forEach(element => {


                    this.url = "courrier/";

                    if (element === "isAttending") {


                        this.url +="isAttending";

                    }
                    else if (element === "isLost") {

                        this.url+= "isLost"

                    }
                    else if(element === "isSend") {
                        this.url +="isSend"
                    }
                    else if(element ==="delivered") {

                        this.url +="deliveCourrier";
                    }

                    let elements= {
                        id:value.id,
                        value:element
                    }

                    this.operate(elements,this.url)
                })


            },

            operate:function(element,url) {

                axios.post(url,element)
                    .then(e => {
                        let toastHTML;

                        if (element.value === "isAttending") {

                            toastHTML='<span>😉Boumm !! Courrier Hors d\'attente </span><button class="btn-flat toast-action">Close</button>';

                        }
                        else if (element.value === "isLost") {

                            toastHTML='<span>iiii!  Courrier Perdu  😢😭😭</span><button class="btn-flat toast-action">Close</button>';


                        }
                        else if(element.value === "isSend") {

                            toastHTML='<span>Super!! Courrier Envoyé 👀👀😂😂</span><button class="btn-flat toast-action">Close</button>';

                        }
                        else if(element.value ==="delivered") {

                            toastHTML='<span>Super!! Courrier Enfin Delivré!!! 😢😭😭</span><button class="btn-flat toast-action">Close</button>';

                        }

                        M.toast({html: toastHTML});
                    })
                    .catch(e => {

                        console.log(e.response)
                    })
            },

            showOperateCourriel :function () {


                this.$parent.setIsShowOperate();
            },
            getIsShowOperate: function () {
                return this.isShowOperate;
            },

            setTabOperate:function(tab) {

                this.tabOperateTransformed.push(tab)

            },


        },



    }
</script>

<style scoped lang="scss" src="../../../assets/sass/OperationCourriel/Operation-courriel.scss"></style>
