<template>


    <div class="add-couriel">
        <b-form @submit.prevent="registerCourriel"  autocomplete="off" class="w-50">

                <b-row align-h="center" class="div-text-new-courrier">


                </b-row>

                <b-row class="my-1 w-100">

                    <b-col sm="3">
                        <label class='label-add'>Expediteur</label>

                    </b-col>

                    <b-col sm="9">

                        <select class="icons form-select-add" v-model="expediteur">

                            <option v-for="(tab, index) in tabAllMember" :value="index" :data-icon="pathImg + '5.jpg'" class="left">{{tab.name}}</option>

                        </select>
                        <span class="errors"  v-if="hasError  && hasErrorExpediteur ? errors.expediteur : ''">{{errors.expediteur}}</span>
                    </b-col>
                </b-row>


                <b-row class="my-1" >
                    <b-col sm="3">
                        <label class='label-add' > type</label>
                    </b-col>
                    <b-col sm="9">
                        <b-form-input  class='form-input-add' type="text" v-model="type"/>
                    </b-col>



                </b-row>
            <span  class="errors" v-if="hasError  && hasErrorType ? errors.type : ''">{{errors.type}}</span>

            <b-row class="my-1" >
                    <b-col sm="3">
                        <label class='label-add' > telephone</label>
                    </b-col>
                    <b-col sm="9">
                        <b-form-input  class='form-input-add' type="number" v-model="telephone" />
                    </b-col>
                    <span  class="errors" v-if="hasError  && hasErrorTelephone ? errors.telephone : ''">{{errors.telephone}}</span>



                </b-row>

                <b-row class="my-1 w-100">

                    <b-col sm="3">
                        <label class='label-add'>Destinataire</label>

                    </b-col>

                    <b-col sm="9">
                        <select class="icons form-select-add"  v-model="destinataire">

                            <option v-for="tab in tabAllMember" :value="tab.id" :data-icon="pathImg + '5.jpg'" class="left">{{tab.name}}</option>

                        </select>
                        <span  class="errors" v-if="hasError  && hasErrorDestinataire ? errors.destinataire : ''">{{errors.destinataire}}</span>

                    </b-col>
                </b-row>

                <b-row class="my-1" >
                    <b-col sm="3">
                        <label class='label-add' > Code</label>
                    </b-col>
                    <b-col sm="9">
                        <b-form-input  class='form-input-add' type="number"  v-model="code" />
                    </b-col>

                    <span  class="errors" v-if="hasError  && hasErrorCode ? errors.code : ''">{{errors.code}}</span>



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
                destinataire:"",
                code :""
            }
        }
    }*/


    export default {


        data() {
            return {

                tabAllMember:this.$route.params.tabAllMembers,
                expediteur:"",
                destinataire:"",
                code:"",
                type:"",
                telephone:"",

                hasError: false,
                hasErrorExpediteur:'',
                hasErrorDestinataire:'',
                hasErrorCode:'',
                hasErrorType:'',
                hasErrorTelephone:'',
                error: '',
                errors: {
                    expediteur:"",
                    destinataire:"",
                    code:"",
                    type:"",
                    telephone:""
                },
                success: false,
                element: {}
            }
        },

        methods: {
            registerCourriel() {
                let app = this;

                //verification du code
                //expediteur = index du tableau recuperé


                if (app.code===app.tabAllMember[app.expediteur].code ) {





                    this.element =
                        {
                        id_expediteur: app.tabAllMember[app.expediteur].id,
                        id_destinataire: app.destinataire,
                        code: app.code,
                        numero: app.telephone,
                        type: app.type
                    };

                    axios.post('courrier/registerCourriel',this.element)
                        .then(e => {


                            app.success = true;
                            app.hasError=false;

                            app.$parent.$children[3].changeIsMessage("Votre courrier a été enregistré Mr" )

                            app.code="";
                            app.telephone="";
                            app.type="";
                            app.id_expediteur="";
                            app.destinataire=""



                        })
                        .catch(res => {


                            console.log(res.response)


                            app.hasError=true;
                            if (_.isArray(res.response.data.errors.id_destinataire)) {
                                app.hasErrorDestinataire= true;
                                app.errors.destinataire= res.response.data.errors.id_destinataire[0];
                            }

                            if (_.isArray(res.response.data.errors.id_expediteur)) {

                                app.hasErrorExpediteur=true;
                                app.errors.expediteur= res.response.data.errors.id_expediteur[0];
                            }

                            if (_.isArray(res.response.data.errors.type)) {

                                app.hasErrorType=true;
                                app.errors.type=res.response.data.errors.type[0];

                            }
                            if (_.isArray(res.response.data.errors.code)) {

                                app.hasErrorCode=true;
                                app.errors.code=res.response.data.errors.code[0];

                            }

                            if (_.isArray(res.response.data.errors.telephone)) {

                                app.hasErrorTelephone=true;
                                app.errors.telephone=res.response.data.errors.telephone;

                            }


                        })

                    }

                    else {
                    //affichage des erreur
                    app.hasError=true;
                    app.hasErrorCode=true;
                }


            }
        },

        beforeRouteEnter(to, from , next) {
            let app = this;
            axios.post('courrier/getAllMember')
                .then(e => {


                    to.params.tabAllMembers = e.data.member;
                    next();
                })
                .catch(e => {

                    app.redirectError(e)

                })
        },


        mounted() {
             console.log("nouveau courriel")
            console.log(this)
        }


    }
</script>
<style   src="../../assets/sass/add-courriel/add-courriel.scss">

</style>
