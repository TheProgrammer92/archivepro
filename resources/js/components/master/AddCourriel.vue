<template>


    <div class="add-couriel">
        <b-form @submit.prevent="registerCourriel"  autocomplete="off" class="w-50">

                <b-row align-h="center" class="div-text-new-courrier">


                </b-row>



                <b-row class="my-1" >
                    <b-col sm="3">
                        <label class='label-add' > Nom</label>
                    </b-col>
                    <b-col sm="9">
                        <b-form-input  class='form-input-add' type="text" v-model="nom"/>
                    </b-col>



                </b-row>
            <span  class="errors" v-if="hasError  && hasErrorNom ? errors.type : ''">{{errors.type}}</span>

                <b-row class="my-1 w-100">

                    <b-col sm="3">
                        <label class='label-add'>Catégories</label>

                    </b-col>

                    <b-col sm="9">
                        <select class="icons form-select-add"  v-model="categorie">

                            <option v-for="value in tab_categorie" :value="value.id" :data-icon="pathImg + '5.jpg'" class="left">{{value.nom}}</option>

                        </select>
                        <span  class="errors" v-if="hasError  && hasErrorCategorie ? errors.categorie : ''">{{errors.categorie}}</span>

                    </b-col>
                </b-row>


                <b-row class="my-1 w-100">

                    <b-col sm="3">
                        <label class='label-add'>Service</label>

                    </b-col>

                    <b-col sm="9">
                        <select class="icons form-select-add"  v-model="service">

                            <option v-for="value in tab_service" :value="value.id" :data-icon="pathImg + '5.jpg'" class="left">{{value.nom}}</option>

                        </select>
                        <span  class="errors" v-if="hasError  && hasErrorService ? errors.service : ''">{{errors.service}}</span>

                    </b-col>
                </b-row>

                <b-row class="my-1" >
                    <b-col sm="3">
                        <label class='label-add' > Fichier</label>
                    </b-col>
                    <b-col sm="9">
                        <b-form-file @change="onFileSelected" class='form-input-add' type="file"  drop-placeholder="Drop file here"  />
                    </b-col>

                    <span  class="errors" v-if="hasError  && hasErrorFichier ? errors.fichier : ''">{{errors.fichier}}</span>



                </b-row>


                <b-row align-h="center">
                   <button id="form-input-submit" >Valider</button>


               </b-row>

        </b-form>


    </div>
</template>




<script>

   /* export default {

        data() {

            return {
                type:"" ,
                service:"",
                fichier :""
            }
        }
    }*/


    export default {


        data() {
            return {


                expediteur:"",
                service:"",
                categorie:"",
                fichier:"",
                type:"",
                telephone:"",
                tab_categorie:this.$route.params.tab_categorie,
                tab_service:this.$route.params.tab_service,
                nom:'',

                hasError: false,
                hasErrorService:'',
                hasErrorFichier:'',
                hasErrorNom:'',
                hasErrorCategorie:'',
                error: '',
                errors: {
                    expediteur:"",
                    service:"",
                    fichier:"",
                    categorie:'',

                },
                success: false,
                element: {}
            }
        },

        methods: {
            registerCourriel() {
                let app = this;

                //verification du fichier
                //expediteur = index du tableau recuperé







                    this.element =
                        {

                        nom: app.nom,
                        fichier: app.fichier,
                        service: app.service,
                        categorie: app.categorie
                    };


                    axios.post('archive/addArchive',this.element)
                        .then(e => {


                            app.success = true;
                            app.hasError=false;

                            app.$parent.$children[3].changeIsMessage("Votre courrier a été enregistré Mr" )
                            app.nom="";
                            app.fichier="";
                            app.categorie="";
                            app.service=""



                        })
                        .catch(res => {


                            console.log(res.response)


                            app.hasError=true;
                            if (_.isArray(res.response.data.errors.service)) {
                                app.hasErrorService= true;
                                app.errors.service= res.response.data.errors.service[0];
                            }

                            if (_.isArray(res.response.data.errors.categorie)) {

                                app.hasErrorCategorie=true;
                                app.errors.categorie= res.response.data.errors.categorie[0];
                            }

                            if (_.isArray(res.response.data.errors.fichier)) {

                                app.hasErrorFichier=true;
                                app.errors.fichier=res.response.data.errors.fichier[0];

                            }

                            if (_.isArray(res.response.data.errors.nom)) {

                                app.hasErrorNom=true;
                                app.errors.nom=res.response.data.errors.nom;

                            }

                        })






            },

            onFileSelected:function(event) {



                 this.fichier= event.target.files[0];



            },
        },

        beforeRouteEnter(to, from , next) {
            let app = this;
            axios.get('archive/categorie')
                .then(e => {


                    to.params.tab_categorie = e.data.categorie;
                    console.log(e.data)


                })
                .catch(e => {

                    app.redirectError(e)

                })

            axios.get('archive/service')
                .then(e => {

                    to.params.tab_service = e.data.service;

                    console.log(e)
                    next();
                })
                .catch(e => {

                    app.redirectError(e)
                //
                })


        },


        mounted() {




        }


    }
</script>
<style   src="../../assets/sass/add-courriel/add-courriel.scss">

</style>
