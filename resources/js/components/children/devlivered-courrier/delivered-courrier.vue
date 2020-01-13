<template>
    <b-row align-h="center" class="w-100 global-search"  >

        <transition name="lightSpeedIn">


            <operation-courriel  :tabOperateTransformed="tabOperateTransformed"     v-if="isShowOperate" ></operation-courriel>
        </transition>

        <b-row classs="w-75" align-h="center" style="flex-direction: column">


            <b-row class="global-search-img" align-h="center" >
                <img :src="pathImg + 'search1.jpg'"  width="200" height="200">

            </b-row>
            <br>
            <b-row  align-h="center" >


                <b-form-input    v-model="search" type="search" placeholder="Enter search" class="w-50 input-search"/>

            </b-row>


        </b-row>

        <b-row class="w-100 div-search" align-h="center" >
            <span class="resultSearch">
                Nous avons trouvés {{countResultSearch ===0? "Aucun Resultat Pour le moment": countResultSearch}} Resulat(s)

                <span v-if="countResultSearch>0">Pour {{search}}</span>
            </span>

        </b-row>
        <b-row class="w-100" align-h="center">



            <show-courriel-search :tabSearchCourrier="tabSearchCourrier" :tabExpeditorCourrier="tabExpeditorCourrier"></show-courriel-search>

        </b-row>



    </b-row>
</template>

<script>
    import OperationCourriel from "../OperationCourriel/Operation-courriel"

    import showCourrielSearch from "../devlivered-courrier/show-courrier-search"
    export default {
        data() {
            return {
                search: '',

                tabSearchCourrier:[],
                tabExpeditorCourrier:[],
                element: {},
                countResultSearch:0,
                isShowOperate:false,

                tabOperateTransformed:[]
            }
        }
        ,

        components: { showCourrielSearch,OperationCourriel },

        watch: {
            search: function () {

                this.searchCourriel();
            }
        },




        methods: {


            searchCourriel:function () {
                console.log(this.search)
                let app = this;
                this.element = {

                    search:app.search
                };

                axios.post("courrier/searchCourrier",this.element)
                    .then(e => {

                        app.tabSearchCourrier = e.data.tabSearchCourrier;
                        app.countResultSearch=app.tabSearchCourrier.length;
                        app.tabExpeditorCourrier= e.data.tabExpeditorCourrier;

                        console.log(e.data)


                    })
                    .catch(e => {


                        console.log(e.response)
                        console.log("search error")
                    })
            },

            getIsShowOperate() {


            },

            setIsShowOperate() {
                this.isShowOperate = !this.isShowOperate

            },

            setTabOperate(value) {

                this.isShowOperate = !this.isShowOperate

                this.tabOperateTransformed= []
                this.tabOperateTransformed.push(value)

            }
        },

        updated(){


        }

    }
</script>

<style lang="scss" src="../../../assets/sass/delivered-courriel/delivered-courriel.scss">


    .lightSpeedIn-enter-active, .lightSpeedIn-leave-active {
        animation: lightSpeedIn .6s;

    }
    .lightSpeedIn-enter, .lightSpeedIn-leave-to /* .fade-leave-active below version 2.1.8 */ {
        animation: lightSpeedIn .5s;

    }
</style>


