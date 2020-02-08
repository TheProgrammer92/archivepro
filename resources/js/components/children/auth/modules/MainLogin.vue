<template>


       <!--display, and page processing (traitement), login-->
            <div style="width:100%">

                <div class="body-form">
                    <h1 style="text-align: center;">Welcome To TheProgrammer</h1>
                    <br>

                    <b-form @submit.prevent="login"  autocomplete="off">
                        <div   class="error_login" v-if="hasError"> <span>{{error_login}}</span></div>
                        <b-form-group id="email"
                                      label-for="email"
                                      :description="hasError && hasErrorEmail ? '' : errors.email">
                            <b-form-input id="email"
                                          type="email"
                                          v-model="email"
                                          required
                                          placeholder="enter email"
                                          >
                            </b-form-input>
                            <!--<span class="floating-label">enter email</span>-->

                        </b-form-group>

                        <b-form-group id="password"

                                      label-for="pasword"
                                      :description="hasError && hasErrorPassword ? '' : errors.password">

                            <b-form-input id="password"
                                          type="password"
                                          v-model="password"
                                          required
                                          placeholder="enter password"
                                          >
                            </b-form-input>
                           <!-- <span class="floating-label">enter email</span>-->

                        </b-form-group

                        >




                        <b-form-group id="exampleGroup4">
                            <b-form-checkbox-group  id="exampleChecks">
                                <b-form-checkbox value="me" class="checkbox-text">Me garder en vie</b-form-checkbox>

                            </b-form-checkbox-group>
                        </b-form-group>


                        <div class="form-group">
                            <Button type="submit" class="submit">Valider</Button>
                        </div>
                    </b-form>

                    <b-row class="btn-auth" align-h="center" s >




                            <h5 >pas encore inscrit?</h5>&nbsp
                            <router-link   :to="{name:'register'}"  class="toRegister"> Inscription</router-link>



                    </b-row>



                </div>

                </div>



</template>

<script>

    export default {
        data() {
            return {
                email: '',
                password: '',
                code: '',
                hasError: false,
                hasErrorEmail:false,
                hasErrorPassword:false,
                hasErrorCode:false,
                errors: {
                    email:'',
                    password:'',

                },
                error_login:''
            }
        },


        methods: {
            login() {
                // get the redirect object

                let app = this;

                this.$auth.login({
                    data: {
                        email: app.email,
                        password: app.password,

                    },
                    success: function(e) {
                        // handle redirection*

                        app.hasError=false;
                        this.$router.push("/loader");
                    },
                    error: function(error) {
                            console.log(error.response);
                        let errors=error.response.data.error;




                        app.hasError=true;
                        app.error_login="Erreur de connexion, verifiez vos identifiants"

                       if (errors.email){
                            app.hasErrorEmail= true;

                            app.errors.email= errors.email[0];
                        }

                        if (errors.password){
                            app.hasErrorPassword= true;
                            app.errors.password= errors.password[0];
                        }


                    },
                    rememberMe: true,
                    fetchUser: true
                })
            }
        },

        mounted() {
            this.$parent.namePageAuth="Connexion"



        },



    }
</script>


<style lang="scss" src="../../../../assets/sass/auth/pages/_MainLogin.scss"></style>
