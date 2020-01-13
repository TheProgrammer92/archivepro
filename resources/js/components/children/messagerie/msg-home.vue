<template>
    <b-row class="w-75">



        <component :is="currentMsgComponentWrapper" v-if="currentMsgComponentWrapper ==='msg-home-component-affiche-wrapper'"></component>
        <component :is="currentMsgComponentWrapper" v-if="currentMsgComponentWrapper ==='msg-msg-component-wrapper'" :tabUserSendMsg="tabInfoUserSend"></component>

    </b-row>
</template>

<script>
    import msgHomeComponentAfficheWrapper from './children/msg-home-component-affiche-wrapper'
    import msgMsgComponentWrapper from './children/msg-msg-component-wrapper'
    export default {
        name: "msghome",

        data() {

            return {
                currentMsgComponentWrapper:'msg-home-component-affiche-wrapper',
                tabInfoUserSend:[]

            }



        },

        components: {
           msgHomeComponentAfficheWrapper, msgMsgComponentWrapper
        },

        methods:  {

            changeCurrentMsgComponentWrapper(component,paramsUserSendMsg= []) {

                this.currentMsgComponentWrapper= component;
                this.tabInfoUserSend = paramsUserSendMsg;
            }
        }
    }
</script>

<style scoped lang="scss" src="../../../assets/sass/messagerie/pages/msg-home.scss"></style>
