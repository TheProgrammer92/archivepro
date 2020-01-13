<template>

    <b-row class="w-100">

        <afficheTemoignage  v-if="isShowAllTemoignage" :tabUser="tabUser" :tabTemoignage="tabTemoignage" ></afficheTemoignage>


        <b-row v-if="!isShowAllTemoignage">



            <div class="preloader-wrapper big active" >
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>
            </div>

        </b-row>
    </b-row>
</template>

<script>

    import afficheTemoignage from "./afficheTemoignage"
    export default {

        data(){
            return {
                /*recup variable  before entre to this route*/

                  tabUser:this.$route.params.tabUser,
                  tabTemoignage:this.$route.params.tabTemoignage,
                  isShowAllTemoignage:this.$route.params.isShowAllTemoignage,    //pour le loader des temoignage avant d'etre affiché




            }
        },
        components:{afficheTemoignage},

        methods : {



            openTemoignage: function() {

                this.$parent.openTemoignageSelected()

            },




    },

        //on remplis les variable avant d'entrer dans cette route
        //notament les tableau qui seront affiché dans   AfficheTemoignage
        beforeRouteEnter(to,from, next) {



            let tabTemoignage=[];
            let tabUser= [];
            let success=false;


            (function() {
                let app = this;

                axios.get('temoignage/family', {params : {

                        type:"famille"
                    }})
                    .then(e => {


                       tabTemoignage.push(e.data.family);
                       tabUser.push(e.data.getUser);
                       success=true;




                        to.params.tabUser=tabUser;
                        to.params.tabTemoignage=tabTemoignage;
                        to.params.isShowAllTemoignage = true;


                        next()


                    })

                    .catch(e => {
                        success=false

                    })
            })();












        },


    mounted() {


    }

    }
</script>


<style lang="scss" src="../../../../assets/sass/temoignage/children/familly.scss" scoped></style>
