<template>
    <b-row class="msg-show-conversation" id="msg-show-conversation-id" v-if="mon_id!==0"  >





        <ul class="w-100"  v-for="message in messages" >




                <li  v-if="message.type==='received'"  class="float-left msg-show msg-show-left"  >
                    <div><img :src="pathImg+ 'profil.jpg'" width="30" height="30" alt=""></div>

                    <div> {{ message.message}}  </div>
                </li>



                <li v-if="message.type==='send'"  class="float-right msg-show msg-show-right"  >

                    <div class="div-img"><img :src="pathImg+ 'profil.jpg'" width="30" height="30" alt=""></div>
                    <div>{{message.message}} </div>



                </li>



        </ul>

        <infinite-loading :identifier="infiniteId" @distance="1" @infinite="infiniteHandler"></infinite-loading>

    </b-row>

</template>

<script>
    export default {
        name: "msg-show-conversation",

        data() {

            return {
                id_receptors: this.$parent.tabUserSendMsg.id,
                getMyMsg:[],
                getHerMsg: [],
                receiveMsg:[],
                mon_id:1,
                page: 1,
                infiniteId:1

            }
        }
        ,

        computed: {

            //computed pour trie du mssage par date
            messages() {

                let app = this;

                this.receiveMsg.sort(function(a,b) {


                    let date1= new Date(a.created_at);

                    let date2= new Date(b.created_at);

                    return  date2 - date1 ;


                });

                return  this.receiveMsg


            }


        },

        methods:  {


            infiniteHandler: function($state) {

                let app = this;

                axios.get('/messagerie/message?page='+this.page,{

                    params:
                        {

                            id_receptor:this.id_receptors
                        }
                })
                    .then(response =>  {


                        app.loadMore($state,response);



                    })
                    .catch(e => {
                        app.redirectError(e)
                    });

                this.page++
            },

            loadMore: function($state,response) {

                //si on a des element
                let app = this;



                if(response.data.myMsg.data.length || response.data.herMsg.data.length) {

                    app.getMyMsg = app.getMyMsg.concat(response.data.myMsg.data);
                    app.getHerMsg = app.getHerMsg.concat(response.data.herMsg.data);

                   //ajout de colone ""type"" avec cette fonction
                    app.addTypeTab(app.getMyMsg,"send");
                    app.addTypeTab(app.getHerMsg,"received");


                    app.receiveMsg=app.getMyMsg;

                    //ajout du second tableau au tableau a parcourir
                    app.getHerMsg.forEach(function(element) {


                        app.receiveMsg.push(element)
                    });



                    setTimeout(() => {


                        //fin du state, on passe a l'autre
                        $state.loaded()


                    },2000);



                    if(response.data.myMsg.total=== app.getMyMsg.length && response.data.herMsg.total=== app.getMyMsg.length)
                    {

                        // tout es fini , fin du chargement
                        $state.complete()
                    }

                }

                else {

                    $state.complete();


                }
            },


            addTypeTab: function(tab,type) {

                tab.forEach(function (element) {
                    element.type=type;

                })
            },

            callInfinite: function(){

                this.infiniteHandler()
            }
        },

        mounted() {

            this.infiniteHandler();
            setInterval(this.infiniteHandler, 3000)


        }



    }
</script>

<style scoped lang="scss" src="../../../../../assets/sass/messagerie/pages/msg-home-conversation-body.scss"></style>

