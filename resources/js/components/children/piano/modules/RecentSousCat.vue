<template>


    <b-container  style="margin-top: 25px">






        <h1>Les plus recent</h1>
        <b-row  class="w-100"   >





                <div v-for="element in afficheVideoRecent" class="col-md-6 col-sm-6 col-lg-3">



                    <div class="card">


                        <div class="card-image waves-effect waves-block waves-light">
                            <router-link :to=" '/video/piano/' + idSousCat + '/'+element.id">
                                 <img :src="pathImg + '5.jpg'" alt="" style="width: 100%;">

                            </router-link>

                            <!--  <img :src="pathIcone + 'play.png'"
                                   style="width:20%;position:absolute;top:60%;transform: translateY(-50%);
                                           ">-->
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{element.name_video}}<i class="material-icons right">more_vert</i></span>
                            <p><a href="#">This is a link</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>




                </div>






        </b-row>

        <br>
        <br>




        <h1>Video A venir</h1>
        <b-row>


            <b-card-group deck>

                <div v-for="element in afficheVideoRecent"  class="col-md-6 col-sm-6 col-lg-3">


                    <b-card overlay
                            :img-src="pathImg + '5.jpg'"
                            img-alt="Card Image"
                            text-variant="white"
                            title="Image Overlay"
                            sub-title="Subtitle">
                        <p class="card-text">
                            Some quick example text to build on the card and make
                            up the bulk of the card's content.
                        </p>
                    </b-card>
                </div>



            </b-card-group>

        </b-row>

    </b-container>
</template>

<script>
    export default {
        name: "RecentSousCat",

        data() {

           return {

                afficheVideoRecent:this.$route.params.affiche,
                idSousCat:this.$route.params.idSousCat,
                   i:[1,2,3],
                   j:0
           }
        },
    // now i verify  if is the correct url
        beforeRouteEnter(to,from, next){




            let  idParams=to.params.idSousCat;


            axios.get('video/piano/sousCat/video',{
                params:{
                    idSousCatParams:idParams
                }
            })
                .then(function (response) {

                    let afficheRecent= response.data;


                    if (afficheRecent.found>0){

                        to.params.affiche=response.data.getVideoAffiche;
                        next()
                    }

                    else{

                        next('/404')
                    }


                })

                .catch(function(error){



                    if (error.response.status===500){

                        next('/500')

                    }

                    if (error.response.status===400){

                        next('/500')

                    }
                })

        }
    }
</script>

<style  lang="scss" src="../../../../assets/sass/piano/pages/RecentSousCat.scss" scoped>

</style>
