import getInfoUser from  "../../../global/js/getInfoUser"
import insertTableau from "../../js/utils";

export default {
    data(){

        return {
            name:'',
            prenom: '',
            telephone: '',
            sexe:'',
            email:'',
            element:{},

            //if error exist

            hasError:false,
            hasErrorName:'',
            hasErrorPrenom:'',
            hasErrorSexe:'',
            hasErrorProfession:'',
            hasErrorEmail:'',
            hasErrorTelephone:'',


            //errors show
            errors:{
                telephone:'',
                name:'',
                sexe:'',
                profession:'',
                email:'',
                prenom:''
            }
            ,


        }
    },
    methods: {



        update:function(updateUserOrTemoignage,type){ //type for determine if  route is temoigner  or update_users


            let app = this;
            insertTableau();


            axios.post(updateUserOrTemoignage,this.element)
                .then(function(response){


                    app.hasError=false;

                    console.log("je veux faire mon choix")

                    if (type==="update_temoignage") {
                        //si on es sur le route temoignage



                    }

                    else {
                            console.log("je suis dans update users")
                    }


s

                })
                .catch(function (error) {
                    app.hasError=true;
                    let errors= error.response.data.errors;

                    if (errors)  {




                        if (errors.name) {


                            app.hasErrorName=true;
                            app.errors.name=errors.name[0];
                        }

                        if (errors.prenom) {


                            app.hasErrorPrenom=true;
                            app.errors.prenom=errors.name[0];
                        }



                        if (errors.email) {
                            app.hasErrorEmail = true;
                            app.errors.email=errors.email[0];
                        }
                        if (errors.telephone) {
                            app.hasErrorTelephone = true;
                            app.errors.telephone=errors.telephone[0];
                        }

                        if (errors.sexe) {
                            app.hasErrorSexe = true;
                            app.errors.sexe=errors.sexe[0];
                        }

                    }

                    else {
                        this.redirectError(error)
                    }





                })
        },


    },
    mounted() {
        //recuperation des info du user


        let app = this;

        let promise =getInfoUser();


        promise.then(function (response) {
            //on charge les variable
            app.name =response.data.data.name;
            app.email = response.data.data.email;
            app.prenom = response.data.data.prenom;
            app.telephone = response.data.data.telephone ===0 ? '':response.data.data.telephone;
            app.userName = response.data.data.userName;
            app.sexe = response.data.data.sexe;

        })
            .catch(function(error){
                //pourquoi ce salot renvoie une erreurs?? tsiuuuppp
                this.redirectError(error)
            })
    }
}
