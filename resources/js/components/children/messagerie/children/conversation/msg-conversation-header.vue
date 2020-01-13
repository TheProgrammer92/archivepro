<template>
    <b-col  class="msg-home-header">

        <b-row class=" msg-conv-header float-left">

            <i class="small material-icons" @click.prevent="changeCurrentMsgComponentWrapper">arrow_back</i>

            <span><img :src="pathMiniatureUser + avatarReceptor" width="35" height="35" alt="" class="msg-img-profil"></span>
            <h2>{{nameReceptor}}</h2>
        </b-row>


    </b-col>
</template>

<script>
    export default {
        name: "msg-conversation-header",

        data() {
            return {

                nameReceptor:this.$parent.tabUserSendMsg.name,
                avatarReceptor: this.$parent.tabUserSendMsg.avatar

            }
        },

        methods: {

            changeCurrentMsgComponentWrapper:function(){

                this.$parent.$parent.changeCurrentMsgComponentWrapper('msg-home-component-affiche-wrapper')
            }
        },

        mounted() {


        },

    }
</script>


<style scoped lang="scss" src="../../../../../assets/sass/messagerie/pages/conversation-children/msg-conversation-header.scss">

</style>
