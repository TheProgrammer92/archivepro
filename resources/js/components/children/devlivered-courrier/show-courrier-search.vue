<template>
    <show-courrier :tabCourrier="tabSearchCourrier"  :tabExpeditorCourrier="tabExpeditorCourrier" :isShowBtnDate="false"></show-courrier>
</template>

<script>

    import showCourrier from "../utils/show-courrier"
    export  default {

        props: {

            tabSearchCourrier:Array,
            tabExpeditorCourrier:Array,

        },
        components: { showCourrier},
        data() {


            return {

                tabCourrier: [],
                valueBtnDate:[],
                count:0,



            }
        },

        mounted() {

            let app = this;
            axios.get('courrier/getAllCourrier')
                .then(e => {

                    let a =2;
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
        }
    }

</script>

<style lang="scss" >
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

    .card-show-content {

        background-color:white;
        padding:15px;
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
