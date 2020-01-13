<template>

    <form @submit.prevent="updatePassword" method="post" class="editMainForm">


        <div class="form-group-TheProgrammer">
            <div class="editMainDivLabel"> <label for="">Ancien mot de passe</label></div>

            <div class="editMainDivInput">
                <input type="text" placeholder="Bojoour tout lemonde" v-model="old_password">
                <span  v-if="hasError && hasErrorOld_password"> {{errors.old_password}}</span>
            </div>
        </div>


        <div class="form-group-TheProgrammer">
            <div class="editMainDivLabel"><label for="">Nouveau</label></div>

            <div class="editMainDivInput">
                <input type="password" placeholder="Bojoour tout lemonde" v-model="password">
                <span  v-if="hasError && hasErrorPassword"> {{errors.password}}</span> {{password}}

            </div>
        </div>

        <div class="form-group-TheProgrammer">
            <div class="editMainDivLabel"><label for="" >Confirmer</label></div>

            <div class="editMainDivInput">
                <input type="password" placeholder="Bojoour tout lemonde" v-model="password_confirmation">
            </div>


        </div>


        <div class="form-group-TheProgrammer">
            <div class="editMainDivLabel">
                <label for=""></label>
            </div>

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

                old_password:'',
                password_confirmation:'',
                password:'',
                hasError:false,
                element:{},

                hasErrorPassword:false,
                hasErrorOld_password:false,

                errors:{
                    password:'',
                    errorOld_password:''
                }

            }
        },
        methods: {

            updatePassword:function() {

                let app = this;

                app.insertTableau();



                axios.post('profil/updatePassword',this.element)
                    .then(function (response) {

                        console.log('ca marche');


                    })
                    .catch(function (errors) {


                        console.log("ca marche pas ein lol");


                        let error= errors.response.data.errors;

                        app.hasError=true;

                        console.log(errors.response);




                       if ( _.isArray(error.password)) {
                            app.hasErrorPassword=true;
                            app.errors.password=error.password[0];
                        }

                        else{
                           app.hasErrorPassword=false;

                       }


                        if (_.isArray(error.old_password)) {

                            app.hasErrorOld_password=true;
                            app.errors.old_password=error.old_password[0];
                        }

                        else{
                            app.hasErrorOld_password=false;

                        }



                    })
            },


            //verification des element  a envoyer et insertion dans le tableau
            insertTableau: function(){
                let app=this;
                //verification du nom

                if (app.password && !(app.password==="")){
                    app.element.password=this.password;
                }


                if (app.password_confirmation && !(app.password_confirmation ==="")){
                    app.element.password_confirmation=this.password_confirmation;
                }


                if (app.old_password && !(app.old_password ==="")){
                    app.element.old_password= this.old_password;
                }

            }
        },

        mounted() {

            //recuperation des info du user
            let app = this;

            let promise = getInfoUser();



            promise.then(function (response) {
                //on charge les variable

                console.log(response.data)
                /*app.password =response.data.data.password;*/


            })
                .catch(function(error){
                    //pourquoi ce salot renvoie une erreurs?? tsiuuuppp
                    console.log(error)
                })
        }
    }
</script>

<style scoped>

</style>
