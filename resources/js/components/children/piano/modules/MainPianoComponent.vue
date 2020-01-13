<template>


    <b-row align-h="center">
        <main class="main-piano">

            <div v-for="categories in showCategories">



            <h3 class="titleManage" > {{categories.titre_categories}} </h3>



                 <div class="row-card">


                <div class="col-md-4"   v-for="sousCategories in showSousCategories"  v-if="sousCategories.id_cat === categories.id">

                    <div class="card">
                        <!--i will pas the id sous categories, for watch all video in this sous_categories-->

                        <router-link  :to="'piano/' +sousCategories.id ">
                            <div class="card-header">

                                <img :src="pathImg + 'dossier3.png'"  class="fullwidth" alt="">
                            </div>
                        </router-link>

                        <div class="card-body" >

                            <div class="card-title">

                                <h4><a href="">{{sousCategories.titre_sous_cat}}</a></h4>

                            </div>

                            <div class="card-description">
                                {{ sousCategories.description_sous_cat }}


                            </div>



                        </div>

                        <footer class="card-footer">
                            <span class="card-footer-date"> 16 janvier</span>
                            <span class="card-footer-text">Discord</span>

                        </footer>


                    </div>



                </div>





              </div>
            </div>




        </main>
    </b-row>


</template>


<script>
    export default {

        data() {

            return {
                showCategories:[],
                showSousCategories:[]
            }
        },

        mounted(){


            //recuperation des categories
            let app = this;
            //recuperation des categories
            axios.get('video/piano/categories')
                .then(function (response) {


                    app.showCategories = response.data.categories_video;




                })
                .catch(function (error) {


                    console.log("la requeste d'obtentions des categories n'a pas été effectué");

                });

            //recuperation des sous_categories

            axios.get('video/piano/sous_categories')
                .then(function(response){
                    app.showSousCategories = response.data.sous_categories_video;


                })
                .catch(function (error) {
                    console.log('pas de sous categories');


                })
        },


    }
</script>


<style scoped lang="scss" src="../../../../assets/sass/piano/pages/mainPiano.scss" ></style>
<style lang="scss" src="../../../../assets/sass/piano/responsivePiano.scss" ></style>
