<template>

    <b-col cols="12" class="msg-page-affiche">



        <msg-conversation-header></msg-conversation-header>


        <msg-show-conversation-body ></msg-show-conversation-body>




       <msg-conversation-footer></msg-conversation-footer>

    </b-col >
</template>

<script>
    import msgHomeAfficheAccueil from './msg-home-affiche-accueil';
    import msgHomeAfficheCommunaute from './msg-home-affiche-communaute';
    import msgShowConversationBody from './conversation/msg-show-conversation-body'
    import msgConversationFooter from './conversation/msg-conversation-footer'
    import msgConversationHeader from './conversation/msg-conversation-header'

    export default {
        name: "msghome",
        props: {

            tabUserSendMsg:Object

        },
        data () {
            return  {


            }
        },

        components: {
            msgHomeAfficheAccueil,msgHomeAfficheCommunaute,
            msgShowConversationBody,
            msgConversationFooter,
            msgConversationHeader
        },

        created() {
            console.log(this.tabUserSendMsg.id)

        }

    }
</script>

<style scoped lang="scss" src="../../../../assets/sass/messagerie/pages/msg-home.scss"></style>
