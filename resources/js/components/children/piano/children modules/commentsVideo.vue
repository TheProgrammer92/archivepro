<template>

    <div class="vd-comment">
        <br>


        <div class="row">

            <form class="col s12">

                <span v-if="hasErrorPostComment">{{errorPostComment}}</span>
                <div class="row">
                    <div class="input-field w-100">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="icon_prefix2" class="materialize-textarea"   v-model="textPostMessage"></textarea>
                        <label for="icon_prefix2">First Name</label>
                    </div>
                </div>
            </form>



        </div>

        <b-row class=" button-post-comment" align-h="end">

            <a class="waves-effect white  btn-small"><i class="material-icons left">cloud</i>Cancel</a>
            <a class="waves-effect waves-light btn-small" @click.prevent="postComment"><i class="material-icons right">cloud</i>Poster un commentaire</a>
        </b-row>




        <br>
        <div class="comment">
            <span v-if="hasErrorRepliqueComment">{{errorRepliqueComment}}</span>

            <ul v-for="(comment,indexComment) in tabComment">

                <li>

                    <div class="card-comment">

                        <div class="card-comment-profil">

                            <img :src="pathIcone + 'profil.jpg'" alt=""  width=" 65"  height="65">

                    </div>


                        <div class="card-comment-message">

                            <header class="header-comment-message">

                                <h4></h4>   <span class="date-comment">{{comment.created_at|moment("dddd, MMMM Do YYYY") }}</span>
                            </header>

                            <div class="body-comment-message">

                               {{comment.message_comment}}
                            </div>


                            <footer class="footer-comment-message">

                                <span class="repondre" @click.prevent="openResponse(comment.id)"> <img :src="pathIcone +'crayon1.png'" alt="" width="30"> Repondre</span>
                            </footer>

                            <div v-if="tabOpenReplique[comment.id]">
                                <b-form-input
                                                v-model="response_post"
                                              type="text"
                                              placeholder="Enter your name">

                                </b-form-input>

                                <b-button variant="primary" @click.prevent="postReplique(comment.id)">Poster</b-button>

                            </div>



                        </div>

                        <b-col offset="1" class="show-response" @click.prevent="getRepliqueComment(comment.id)" v-if="comment.response_comment===1">
                            Afficher les response..
                        </b-col>


                        <!--affiche for  click response -->

                        <!--on l'affiche si et seulement s'il y'a une reponse de commentaire-->



                    </div>


                    <div v-for="replique_comment in tabRepliqueComment[comment.id]"  v-if="tabGenerate[comment.id] ">



                        <div class="card-comment-reponse">

                            <div class="card-comment">

                                <div class="card-comment-profil">

                                    <img :src="pathIcone + 'profil.jpg'" alt="profil"  width="65" height="65">

                                </div>


                                <div class="card-comment-message">

                                    <header class="header-comment-message">

                                        <h4> Jesbeer nguimatio</h4>   <span class="date-comment">Hier a 17h</span>
                                    </header>

                                    <div class="body-comment-message">

                                        {{replique_comment.message_replique_comment}}
                                    </div>


                                    <footer class="footer-comment-message">

                                        <span class="repondre"> <img :src="pathIcone +'crayon1.png'" alt="" width="30"> Repondre</span>
                                    </footer>

                                </div>

                            </div>

                         </div>
                    </div>
                </li>


            </ul>
            <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>

        </div>









    </div>
</template>

<script src="../js/comment.js">

</script>

<style scoped lang="scss" src="../../../../assets/sass/piano/pages/sassComponent/commentsVideo.scss"  ></style>
