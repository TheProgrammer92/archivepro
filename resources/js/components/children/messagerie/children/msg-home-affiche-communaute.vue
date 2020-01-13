<template>



        <b-col class="msg-home-affiche-accueil">

            <div class="w-100" v-for="element in tabAllUser">




                <div class="col s12 m12 row-conversation" v-if="element.id!==mon_id"  @click.prevent="insertPageReception(element)">

                    <div class="card horizontal">
                        <div class="card-image">
                            <img :src="pathMiniatureUser + element.avatar" width="70" height="70">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h2>{{ element.name}} </h2>
                                <p>I am a very simple card. I.</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>




        </b-col>
    </template>

    <script>
        export default {
            name: "msg-home-affiche-communaute",

            data() {

                return {

                    tabAllUser: [],
                    tabUserOnLine:[],
                    mon_id:0
                }
            },

            methods: {
            //insertion pour select, et afficher a la page, d'accueil
                insertPageReception: function (element) {

                    let app = this;


                    axios.post('messagerie/insertPageReception',

                            {
                                id_recepteur:element.id

                           }
                    )
                        .then(res => {

                        })
                        .catch(e=> {

                            app.redirectError(e)
                        })

                    this.$parent.$parent.changeCurrentMsgComponentWrapper('msg-msg-component-wrapper',element)

                },

                showMember:function() {

                    let app = this;

                    //recuperation , des info du users


                    axios.get('/messagerie/membre')
                        .then(res => {


                            app.tabAllUser=res.data.users;



                        })
                        .catch(e => {


                        });

                    let promise= this.getInfoUser();



                    //recuperation des info
                    promise.then(e=> {


                        app.mon_id=e.data.data.id;

                    })



                },


            },


            mounted() {

                this.showMember()


            },
            updated() {
                setInterval(this.showMember,10000)
            }



        }
    </script>

    <style scoped lang="scss" src="../../../../assets/sass/messagerie/pages/msg-home-affiche-accueil.scss"></style>





