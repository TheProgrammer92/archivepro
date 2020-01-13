<template>



    <!--display, and page processing (traitement), login-->
    <div style="width:100%">



        <div class="body-form">
            <h1 style="text-align: center;">Welcome To TheProgrammer</h1>
            <br>

            <b-form @submit.prevent="register"  autocomplete="off">

                <b-form-group id="name"
                              label-for="User name"
                              :description="hasError  && hasErrorName ? errors.name : ''">

                         <!--   <span v-if="hasError  && hasErrorName ">  errors.name </span>-->


                    <b-form-input id="name"
                                  type="text"
                                  v-model="name"
                                  required
                                  placeholder="enter name"
                                  :description="hasError && hasErrorName ? errors.name : ''"
                    >
                    </b-form-input>
                    <!--<span class="floating-label">enter email</span>-->

                </b-form-group>

                <b-form-group id="email"
                              label-for="email"
                              :description="hasError && hasErrorEmail ? errors.email : ''">

                    <b-form-input id="email"
                                  type="email"
                                  v-model="email"
                                  required
                                  placeholder="enter email"
                    >
                    </b-form-input>
                  <!--  <span v-if="hasError && hasErrorEmail">errors.email</span>-->
                    <!--<span class="floating-label">enter email</span>-->

                </b-form-group>
                <b-form-group id="password"
                              label-for="pasword"
                              :description="hasError && hasErrorPassword ? errors.password : ''">

                    <b-form-input id="password"
                                  type="password"
                                  v-model="password"
                                  required
                                  placeholder="enter password"
                    >
                    </b-form-input>

                    <!--<span v-if="hasError && hasErrorPassword">errors.password</span>-->
                    <!-- <span class="floating-label">enter email</span>-->

                </b-form-group>


                <b-form-group id="password_confirmation"
                              label-for="pasword">

                    <b-form-input id="password_confirmation"
                                  type="password"
                                  v-model="password_confirmation"
                                  required
                                  placeholder="confirm password"
                    >
                    </b-form-input>
                    <!-- <span class="floating-label">enter email</span>-->

                </b-form-group>

                <b-form-group id="code"
                              label-for="code"
                              :description="hasError && hasErrorCode ? errors.code : ''">

                    <b-form-input id="code"
                                  type="number"
                                  v-model="code"

                                  placeholder=" code si vous ete gestionnaire"
                    >
                    </b-form-input>
                    <!--  <span v-if="hasError && hasErrorEmail">errors.email</span>-->
                    <!--<span class="floating-label">enter email</span>-->

                </b-form-group>



                <div class="form-group">
                    <Button type="submit" class="submit">Valider</Button>
                </div>
            </b-form>

            <b-row class="btn-auth" align-h="center"  >




                <h5 >pas encore inscrit?</h5>&nbsp
                <router-link   :to="{name:'login'}"  class="toRegister">Connexion</router-link>



            </b-row>



        </div>

    </div>



</template>

<script>




    export default {


       data() {
            return {
                name: '',
                email: '',
                password: '',
                code:'',
                password_confirmation: '',
                hasError: false,
                hasErrorName:'',
                hasErrorEmail:'',
                hasErrorPassword:'',
                hasErrorCode:'',
                error: '',
                errors: {
                    name:'',
                    email: '',
                    password:'',
                    code:''
                },
                success: false,
                element: {}
            }
        },

        methods: {
            register() {
                let app = this;

                if (app.code==="" ) {

                    app.code=3333;
                }



                this.element = {
                    name: app.name,
                    email: app.email,
                    code: app.code,
                    password: app.password,
                    password_confirmation: app.password_confirmation
                };

                axios.post('auth/register',this.element)
                    .then(e => {


                        app.success = true;
                        app.hasError=false;
                        app.$parent.showCode(e.data.code)


                        app.$router.push({name:"login"});
                    })
                    .catch(res => {


                        console.log("erreur inscription")

                        console.log(res.response)
                        app.hasError=true;
                        if (_.isArray(res.response.data.errors.name)) {
                            app.hasErrorName= true;
                            app.errors.name= res.response.data.errors.name[0];
                        }

                        if (_.isArray(res.response.data.errors.email)) {

                            app.hasErrorEmail=true;
                            app.errors.email= res.response.data.errors.email[0];
                        }

                        if (_.isArray(res.response.data.errors.password)) {

                            app.hasErrorPassword=true;
                            app.errors.password=res.response.data.errors.password[0];

                        }
                        if (_.isArray(res.response.data.errors.code)) {

                            app.hasErrorcode=true;
                            app.errors.code=res.response.data.errors.code[0];

                                                }

                        if (_.isArray(res.response.data.errors.responseCode)) {

                            app.hasErrorCode=true;
                            app.errors.code=res.response.data.errors.responseCode;

                        }


                    })


            }
        },

        mounted() {

           //changement du nom de la page

            this.$parent.namePageAuth="Inscription";





        }


    }

</script>


<style lang="scss" src="../../../../assets/sass/auth/pages/_MainLogin.scss"></style>
