<template>
    <b-row class="card-show-note"  >


        <b-row class="w-100 card-show-btn" >

            <a class="waves-effect waves-light btn"> Aujourd'hui</a>
        </b-row>
        <b-row class="card-show w-100" v-for="(value,cle) in tabCourrier" :key="cle">

            <!--      <b-row class="w-100 card-show-btn" v-if="getDate(value,cle)">

                      <a class="waves-effect waves-light btn"> {{ valueBtnDate[cle] }}</a>
                  </b-row>-->


            <b-row class="card-show-content w-100">
                <label>
                    <input type="checkbox" />
                    <span ></span>
                </label>

                <span> <span class="text-code-courier"> Code: {{value.code}}</span>
                            <span class="text-name-receptor">Courier pour <strong>{{value.name}}</strong>
                            </span>

                            <span class="text-name-receptor">Courier pour <strong>{{value.updated_at}}</strong>
                            </span>

                        </span>
            </b-row>

        </b-row>
        </b-row>
</template>

<script>
    export  default {
        data() {

            return {

                tabCourrier: [],
                valueBtnDate: [],
                count: 0,

            }
        },

        mounted() {

            let app = this;
            axios.get('courrier/getAllCourrier')
                .then(e => {


                    app.tabCourrier = e.data.courrier;
                    let tab_expediteur = e.data.expediteur;
                    let tab_destinataire = e.data.destinataire;


                    let i=0;
                    app.tabCourrier.forEach(function (element) {

                        element.code= tab_destinataire[i].code;
                        element.avatar= tab_destinataire[i].avatar;
                        element.name= tab_destinataire[i].name;

                        i++;


                    })





                })
                .catch(res => {
                    console.log(res.response)

                })
        },

        methods: {
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

        created() {

        }
        }

</script>

<style scoped>

</style>
