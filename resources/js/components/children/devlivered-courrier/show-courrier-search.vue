<template>
    <show-courrier :tabSearch="tabSearch" :tabCategorie="tabCategorie"  :isShowBtnDate="false"></show-courrier>
</template>

<script>

    import showCourrier from "../utils/show-courrier"
    export  default {

        props: {

            tabSearch:Array,
            tabCategorie:Array


        },
        components: { showCourrier},
        data() {


            return {

                tabCourrier: [],
                valueBtnDate:[],
                count:0,



            }
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

        updated() {

            // console.log("des categ")
            //
            // console.log(this.tabSearch)
            // console.log(this.tabCategorie)
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
