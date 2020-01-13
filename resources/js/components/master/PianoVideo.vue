<template>


    <div class="contains">



            <b-row>


                <router-view></router-view>
            </b-row>






    </div>
</template>

<script>


/*    import programmerCreation from '../children/piano/modules/programmerCreation'*/


    export  default {

        data(){
            return {

                titre_video:this.$route.params.params_name_video,
                vd:[]
            }
        },

        components: {
           programmerCreation:resolve=>require(['../children/piano/modules/programmerCreation'],resolve)
        },

        // now i verify  if is the correct url
        /*ensuite on transmet les params a la prochaine route*/
        beforeRouteEnter(to,from, next){




            let  idParams=to.params.idPlay;
            let idSousCat=to.params.liste;


            axios.get('video/piano/sousCat/video/play',{
                params:{
                    id_video:idParams,
                    id_sous_cat:idSousCat
                }
            })
                .then(function (response) {

                    let afficheRecent= response.data;

                    if (afficheRecent.found>0){
                        //on ajoute dans une variable des le router  ^^
                        to.params.params_name_video=response.data.getVideo[0].name_video;

                        next()
                    }

                    else{

                        next('/404')
                    }


                })

                .catch(function(error){
                    app.redirectError(error)
                })

        }
    }
</script>

<style lang="scss" src="../../assets/sass/piano/responsivePiano.scss" ></style>
<style lang="scss" src="../../assets/sass/piano/TheProgrammerPiano.scss" ></style>


