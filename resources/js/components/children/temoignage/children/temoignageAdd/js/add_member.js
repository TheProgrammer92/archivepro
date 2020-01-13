
export default {


    data() {
        return {
            name: '',
            email: '',
            password: '',
            telephone:'',
            sexe:0,

            hasError: false,
            hasErrorName:'',
            hasErrorEmail:'',
            hasErrorPassword:'',
            hasErrorTelephone:'',
            hasErrorSexe:'',


            error: '',
            errors: {
                name:'',
                email: '',
                password:'',
                telephone:'',
                sexe:''
            },
            success: false,
            element: {}
        }
    },

    methods: {
        register(whatMemberEnter) {


            let app = this;
            this.element = {
                name: app.name,
                email: app.email,
                telephone: app.telephone,
                sexe: app.sexe,
                password: app.password,
                code:3333,
                whatMember:whatMemberEnter
            };

            axios.post('auth/registerClient',this.element)
                .then(e => {


                    app.success = true;
                    app.hasError=false;


                    var toastHTML = '<span>Operation Effectué </span><button class="btn-flat toast-action">Close</button>';
                    M.toast({html: toastHTML});

                    //affichage du code du user a l'accueil
                    app.$parent.$parent.$parent.$children[3].showCode(e.data.code, app.name)

                    //vidage des variable


                    app.name = "";
                    app.email ="";
                    app.telephone ="";
                    app.sexe="";
                    app.password="" ;
                     app.code ="";




                })
                .catch(res => {


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

                    if (_.isArray(res.response.data.errors.responseCode)) {

                        app.hasErrorCode=true;
                        app.errors.code=res.response.data.errors.responseCode;

                    }

                    if (_.isArray(res.response.data.errors.telephone)) {

                        app.hasErrorTelephone=true;
                        app.errors.telephone=res.response.data.errors.telephone;

                    }


                })


        }
    },




}
