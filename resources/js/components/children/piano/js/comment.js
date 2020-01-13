export default {
    data() {

        return {
            //params get to routing
            id_video: this.$route.params.idPlay,

            tabComment: [],
            tabUserInfo: [],
            tabRepliqueComment: [],
            afficheResponse:false,

            //pour savoir si on dois lancer la requete ajax ou non


            tabGenerate:[],
            //le v-model pour recuperer la reponse
            response_post:'',

            tabOpenReplique: [],
            textPostMessage:'',

            //for errors
            errorPostComment:'',
            hasErrorPostComment:false,

            errorRepliqueComment:'',
            hasErrorRepliqueComment:false,

            page:1
        }
    },

    mounted() {
        this.afficheAllComment()

    }

    ,

    methods: {


        afficheAllComment:function($state) {

            let app = this;


            axios.get('video/piano/sousCat/video/play/comments?page='+this.page,{
                params:{
                    id_video:app.id_video
                }
            })
                .then(function (response) {



                   //tab for comment
                    app.tabComment=response.data.getComment.data;


                    //tab for user info
                   app.tabUserInfo=response.data.userInfo;


                    //generation d'un tableau avec les id des comment
                    let i = 0;

                    app.tabComment.forEach(function (element) {



                        app.tabGenerate[element.id]=false;

                        i++

                    });


                })
                .catch(function (error) {

                    console.log(error)

                });



        },

        infiniteHandler:function($state) {

            let app = this;
            axios.get('video/piano/sousCat/video/play/comments?page='+this.page,
                {
                params:{
                    id_video:app.id_video
                }
            })
                .then(function (response) {

                    app.loadMore($state,response)
                });

            this.page++

        } ,

        loadMore:function($state,response) {


                //si on a des element
                if(response.data.getComment.data.length) {

                    this.tabComment=this.tabComment.concat(response.data.getComment.data)

                        setTimeout(() => {


                            //fin du state, on passe a l'autre
                            $state.loaded()


                        },2000);



                    if(response.data.getComment.total=== response.data.getComment.data.length)
                    {

                        // tout es fini , fin du chargement
                        $state.completed()
                    }

                }

                else {

                    $state.complete();


                }
        },
        //response for comment
        getRepliqueComment:function (id_comment) {
            let app = this;


            if(app.tabGenerate[id_comment]===true) {

                app.tabGenerate.splice(id_comment,1,false)
            }

            else {

                axios.get('video/piano/sousCat/video/play/replique_comments',{
                    params: {
                        id_video_comment: id_comment
                    }
                })
                    .then(function (response) {


                        //parcours du tableau pour voir les android indefini et leur mettre a nulll
                        for (let i = 0; i <id_comment ; i++) {

                            if (app.tabRepliqueComment[i]===undefined) {
                                app.tabRepliqueComment.splice(i,1,null);

                            }

                        }


                        app.tabRepliqueComment.splice(id_comment,1,response.data.getRepliqueComment);

                    })
                    .catch(function (error) {
                        console.log(error)
                    });

                app.tabGenerate.splice(id_comment,1,true);


            }

        },


        openResponse(id_comment) {
            let app =this;

            for (let i = 0; i <id_comment ; i++) {

                if (app.tabOpenReplique[i]===undefined) {
                    app.tabOpenReplique.splice(i,1,null);

                }

            }

            this.tabOpenReplique.splice(id_comment,1,!this.tabOpenReplique[id_comment]);

        },


        postComment(){

            let app = this;

            axios.get('video/piano/sousCat/video/play/post_comment',{

                params:{
                    message_comment:app.textPostMessage,
                    id_video:app.id_video
                }

            })
                .then(function (response) {


                    //actualisation des comments

                    if (response.data.status===401) {

                        app.hasErrorPostComment=true;
                        app.errorPostComment="Vous devez vous connecter "
                    }

                    else{

                        app.afficheAllComment()
                    }
                    app.textPostMessage=""
                })
                .catch(function (error) {





                    if (_.isArray(error.response.data.errors.message_comment)) {

                        app.hasErrorPostComment=true;
                        app.errorPostComment=error.response.data.errors.message_comment[0]
                    }

                })


        },
        postReplique(id_comment){

            let app=this;

            axios.get('video/piano/sousCat/video/play/post_replique_comments',{
                params: {
                    id_video_comment: id_comment,
                    message_replique_comment:app.response_post
                }
            })
                .then(function (response) {


                    app.response_post="";

                    if (response.data.status===401) {

                        app.hasErrorRepliqueComment=true;
                        app.errorRepliqueComment="Vous devez vous connecter "
                    }

                    else{

                        app.getRepliqueComment(id_comment);
                        app.hasErrorRepliqueComment=false;

                    }

                })
                .catch(function (error) {




                    if (error.response.data.errors) {


                        if (_.isArray(error.response.data.errors.message_replique_comment))
                        {

                            app.hasErrorRepliqueComment=true;
                            app.errorRepliqueComment=error.response.data.errors.message_replique_comment[0]

                        }


                    }




                })

        },


        //get  info users

    }


}
