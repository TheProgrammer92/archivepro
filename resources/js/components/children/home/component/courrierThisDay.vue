<template>
    <b-row class="card-show-note"  >


        <b-row class="w-100 card-show-btn" >

            <a class="waves-effect waves-light btn"> Aujourd'hui</a>
            <a class="waves-effect waves-light btn"> Demain</a>
        </b-row>
        <b-row class="card-show w-100" v-for="(value,cle) in tabArchive" :key="cle">

            <!--      <b-row class="w-100 card-show-btn" v-if="getDate(value,cle)">

                      <a class="waves-effect waves-light btn"> {{ valueBtnDate[cle] }}</a>
                  </b-row>-->


            <b-row :class="{'bg-gray': value.etat===0, 'bg-white':value.etat===1,'card-show-content w-100':true}">
                <label>
                    <input type="checkbox" />
                    <span ></span>
                </label>

                <span>

                    {{value}}
                    <span class="text-code-courier"> {{value.etat}}Code: {{value.id}}</span>
                            <span class="text-name-receptor">Archive pour <strong>{{value.nom}}</strong>
                            </span>

                            <span class="text-name-receptor">Date pour <strong>{{value.updated_at}}</strong>
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

                tabArchive: [],
                valueBtnDate: [],
                count: 0,

            }
        },

        mounted() {

            let app = this;
            axios.get('archive/getAll')
                .then(e => {


                    app.tabArchive = e.data.archive;




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

