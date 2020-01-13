<template>
    <form @submit.prevent="updateEmail" method="post" class="editMainForm">


        <div class="form-group-TheProgrammer">
            <div class="editMainDivLabel">
                <label for="">Ancienne email</label></div>

            <div class="editMainDivInput">
                <input type="email" placeholder="Bojoour tout lemonde" v-model="old_email">
                <span v-if="hasError && hasErrorOld_email"> {{errors.old_email}}</span>
            </div>

        </div>

        <div class="form-group-TheProgrammer">
            <div class="editMainDivLabel">

                <label for="">Nouveau Email</label></div>

            <div class="editMainDivInput">
                <input type="email" placeholder="Bojoour tout lemonde" v-model="email">
                <span v-if="hasError && hasErrorEmail">{{errors.email}}</span>
            </div>
        </div>

        <div class="form-group-TheProgrammer">
            <div class="editMainDivLabel"><label for="">confirm email</label></div>

            <div class="editMainDivInput">
                <input type="email" placeholder="Bojoour tout lemonde" v-model="email_confirmation">
            </div>
        </div>
         <div class="form-group-TheProgrammer">

             <div class="editMainDivLabel" style="visibility: hidden"><label for="">Confirm email</label></div>

             <div class="editMainDivInput">

                 <button type="submit" class=" form-control-TheProgrammer btn-pink-TheProgrammer">
                     Valider
                     <img :src="pathIcone + 'crayon1.png'" alt="" width="25" height="25">

                 </button>

             </div>
        </div>








    </form>
</template>

<script>
    import getInfoUser from "../../../global/js/getInfoUser";

    export default {

        data() {


            return {

                old_email:'',
                email_confirmation:'',
                email:'',
                hasError:false,
                element:{},

                hasErrorEmail:false,
                hasErrorOld_email:false,

                errors:{
                    email:'',
                    errorOld_email:''
                }

            }
        },
        methods: {

            updateEmail:function() {

                let app = this;

                app.insertTableau();



                axios.post('profil/updateEmail',this.element)

                    .then(function (response) {

                        console.log('ca marche');

                        app.hasError=false;


                    })
                    .catch(function (errors) {





                        let error= errors.response.data.errors;

                        app.hasError=true;





                        if ( _.isArray(error.email)) {
                            app.hasErrorEmail=true;
                            app.errors.email=error.email[0];
                        }

                        else{
                            app.hasErrorEmail=false;

                        }


                        if (_.isArray(error.old_email)) {

                            app.hasErrorOld_email=true;
                            app.errors.old_email=error.old_email[0];
                        }

                        else{
                            app.hasErrorOld_email=false;

                        }



                    })
            },


            //verification des element  a envoyer et insertion dans le tableau
            insertTableau: function()
            {
                let app=this;
                //verification du nom

                if (app.email && !(app.email==="")){
                    app.element.email=this.email;
                }


                if (app.email_confirmation && !(app.email_confirmation ==="")){
                    app.element.email_confirmation=this.email_confirmation;
                }


                if (app.old_email && !(app.old_email ==="")){
                    app.element.old_email= this.old_email;
                }

            }
        },

        mounted() {

            //recuperation des info du user
            let app = this;

            let promise = getInfoUser();



            promise.then(function (response) {
                //on charge les variable


                app.old_email =response.data.data.email;


            })
                .catch(function (error) {
                    //pourquoi ce salot renvoie une erreurs?? tsiuuuppp
                    console.log(error)
                })
        }

    }
</script>

<style scoped>

</style>
