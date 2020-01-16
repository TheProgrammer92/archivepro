<template>


    <b-row  class="operate-global-courriel" align-h="center" align-v="start"  >


       <span  ><i class=" material-icons icon-close" @click.prevent="showOperateCourriel">close</i></span>

        <h1>Etats De l'archive</h1>


       <b-row align-h="center" class="w-100 div-state-courriel" v-for="(element,index) in tabOperateTransformed" :key="index">


           <b-row class="w-100 state-courriel" align-h="center">
               <b-col>Archive en attente</b-col>

               <b-col>
                   <div class="switch">
                       <label>
                           <input v-if="element.etat===0"  type="checkbox" :value="element.etat" v-model="checkNames">
                           <input v-if="element.etat===1" checked  type="checkbox" >
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



                    if (element === 0) {


                        element =1;

                    }
                    else {

                        element =0;
                    }


                    let elements= {
                        id:value.id,
                        value:element
                    }

                    this.operate(elements,this.url)
                })


            },

            operate:function(element,url) {

                console.log(element)

                axios.post('/archive/editEtat',element)
                    .then(e => {

                        console.log(e.data)
                        let toastHTML;



                            toastHTML='<span>😉Boumm !! Archive !!! </span><button class="btn-flat toast-action">Close</button>';




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
