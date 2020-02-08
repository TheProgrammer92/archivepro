<template>
    <b-row class="card-show-note"  >


        <b-row class="w-100 card-show-btn" v-for="(categorie, index) in tabCategorie" :key="index">

            <a class="waves-effect waves-light btn"> {{categorie.nom}}</a>





        <b-row class="card-show w-100" v-for="(value,cle) in tabSearch" v-if="value.id_cat===categorie.id" :key="cle">

            <!--      <b-row class="w-100 card-show-btn" v-if="getDate(value,cle)">

                      <a class="waves-effect waves-light btn"> {{ valueBtnDate[cle] }}</a>
                  </b-row>-->

            <!--<affiche-delivered-courrier v-if="isShowDeliveCourrier" :tabInfoCourrierDelive="value" ></affiche-delivered-courrier>-->

            <b-row :class="{'bg-gray': value.etat===1, 'bg-white':value.etat===0,'card-show-content w-100':true}">

                <b-row class="w-50">


                    <label>
                        <input type="checkbox"  class="filled-in" :checked="value.delivered===1 ? 'checked' :'' "  />
                        <span ></span>
                    </label>

                    <span> <span class="text-code-courier"> Code: {{value.nom}}</span>
                    <span class="text-name-receptor">Archive de <strong>{{value.nom}}</strong></span>
                    <span class="text-name-receptor">archive <strong>{{value.etat ===0? '  Valide'  : ' Non valide'}}</strong></span>

                    <!--<span class="text-name-receptor">Courier pour <strong>{{value.type}}</strong></span>-->
                </span>
                </b-row>

                <b-row class="w-50 btn-operate" align-h="end"  >



                    <a class="btn-floating btn-small waves-effect waves-light red" ><i class="material-icons"  @click.prevent="showOperateCourriel(value)">build
                    </i></a>
                    <a class="btn-floating btn-small waves-effect waves-light red" data-dismiss="modal" data-toggle="modal" data-target="#modalUpdate"><i class="material-icons">add</i></a>

                </b-row>
            </b-row>





        </b-row>



            <b-row class="card-show w-100" v-else>

               <div>

                  <p> <small style="color:black">Aucune archive pour cette catégorie</small></p>
               </div>
            </b-row>
        </b-row>
    </b-row>
</template>

<script>

    import afficheDeliveredCourrier from "./../devlivered-courrier/affiche-delive-courrier"
    export default {

        props: {

            tabSearch:Array,
            tabCategorie:Array,
            tabExpeditorCourrier:Array,
            isShowBtnDate:Boolean,


        },

        components: {

            afficheDeliveredCourrier
        },

        data() {

            return {

                isShowDeliveCourrier:true
            }
        },
        methods: {

            showDeliveCourrier:function() {


                if (this.isShowDeliveCourrier ===true)  {

                    $('body').removeClass("modal-open");
                    $('.modal-backdrop').removeClass("modal-backdrop fade show");
                }

                else {

                    $('body').addClass("modal-open");
                    $('.modal-backdrop').addClass("modal-backdrop fade show");
                }

                this.isShowDeliveCourrier=!this.isShowDeliveCourrier;
            },


            showOperateCourriel :function (tabOperateCourriel) {


                //on passe le tableau a la vue """delivered courriel"" pour aller a "operate Courriel"

                this.$parent.$parent.setTabOperate(tabOperateCourriel);

            }

        },

        updated() {
            console.log("mounted comp")

            console.log(this.tabCategorie);
            console.log(this.tabSearch)
        }

    }
</script>


    <style lang="scss" >


        .btn-operate a {

            margin:0 10px;
        }
   .card-show-note {
       margin:16px 0;
       width:90%;

    .card-show-btn {

    a {

        color:white;
        background-color:rgb(231, 76, 60);
        margin:15px 0;

    }


    }



       .bg-white{

           background:white;
       }
       .bg-gray {

           background:rgba(0,0,0,.1);
       }

    .card-show-content {


        padding:10px;
        margin:8px 0;

    }

    .text-code-courier {

        font-weight:300;
        color:rgb(52, 152, 219);

    }

    .text-name-receptor {

        margin-left: 35px;
    }
    }

</style>

