<template>
    <b-row class="msg-header-final">

        <b-col cols="2">
            <i class="small material-icons">camera_alt</i>

        </b-col>
        <b-col cols="8">
            <textarea name="" id="" cols="30" rows="10" placeholder="Entrez un message" v-model="messages"></textarea>
        </b-col>

        <b-col>
            <i class="small material-icons" @click="sendMessage">send</i>

        </b-col>

    </b-row>
</template>

<script>
    // gestion de l'envoie du message
    export default {
        name: "conversation-bottom",

        data() {

            return {

                messages:'',
                id_receptor:this.$parent.tabUserSendMsg.id
            }
        },

        methods: {

            sendMessage:function() {
                let app = this;


                if (app.messages!=='')  {




                    let element= {
                        id_recepteur:app.id_receptor,
                        message:app.messages,
                    };
                    axios.post('/messagerie/sendMessage',element)
                        .then(e => {

                            //rechargement, des conversation
                            //creation d'un nouveau element pour le push dans le tableau des conv...
                            element =e.data.element;

                            app.message="";

                            element.type="send";
                            app.$parent.$children[1].receiveMsg.push(element);
                            app.$parent.$children[1].receiveMsg=app.$parent.$children[1].messages;


                        })
                        .catch(e  =>   {

                                app.redirectError(e)
                    })

                }

            }
        },
        mounted() {


        }
    }
</script>

<style scoped lang="scss" src="../../../../../assets/sass/messagerie/pages/conversation-children/msg-conversation-footer.scss">

</style>
