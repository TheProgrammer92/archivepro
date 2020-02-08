


let containtMixin= {

    data:function () {
        return {
            pathIcone:"/images/icone/",
            pathImg:"/images/images/",
            pathLogo:"/images/logo/",
            pathSvg:'/images/svg/',
            pathVideo:'/video/',

            //users

            pathTemoignage:'/images/users/temoignage/',
            pathMiniatureUser: '/storage/userMiniature/',
            pathUserImg: '/storage/user/',



            user: {

                name:'',
                avatar:'',
                id: '',
                role:''
            }
        }
    },
    methods: {

        redirectError:function (error) {
            let app = this;

            console.log(error.response)


            // if (error.response.data.status="500") {
            //
            //     app.$router.push("/500");
            //
            // }
            //
            // else if(error.response.data.status="404") {
            //     console.log("erreur 404");
            //     console.log(error.response.data);
            //     app.$router.push("/404");
            // }
            //
            // else if(error.response.data.status="401") {
            //
            //     app.$router.push("/401");
            // }

        },

        getInfoUser:function() {

            //now retrieval of user information
            let data = axios.get('auth/user')
                .then(function(response){


                    return response

                })
                .catch(function(error){

                    this.redirectError(error)
            });



            return data;
        },

        getInfo :function() {

            let promise = this.getInfoUser();
            let app= this;
            promise.then(function (response) {



                app.user.avatar = app.pathMiniatureUser + response.data.data.avatar;
                app.user.id =  response.data.data.id;
                app.user.role =  response.data.data.role;






            })
                .catch(e => {

                    this.redirectError(e)
                })

        }
    },
    created(){

        //initialising: materialize
        $(function () {

            M.AutoInit();







        })
    },






}


export default  containtMixin
