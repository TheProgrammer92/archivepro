<template>

    <b-col cols="12" class="msg-page-affiche">




        <b-col  class="msg-home-header">

            <b-row class=" msg-home-header-div float-left">
                <span><img :src="pathImg + 'profil.jpg'" width="40" height="40" alt="" class="msg-img-profil"></span>
                <h1>Chat</h1>
            </b-row>

            <b-row class=" msg-home-header-div float-right search">
                <span><img :src="pathIcone + 'search.png'" width="40" height="40" alt="" class="msg-img-search"></span>

            </b-row>
        </b-col>


            <component :is="currentMsgHomeComponents"></component>





        <b-row class="msg-header-final">
            <nav>



                <a href="#!" >  <i @click.prevent="changeCurrentMsgHomeComponent('msg-home-affiche-accueil')" class="small material-icons">message</i></a>
                <a href="#!" >  <i @click.prevent="changeCurrentMsgHomeComponent('msg-home-affiche-communaute')" class="small material-icons">add_circle</i></a>

            </nav>
        </b-row>

    </b-col >
</template>

<script>
    import msgHomeAfficheAccueil from './msg-home-affiche-accueil';
    import msgHomeAfficheCommunaute from './msg-home-affiche-communaute';

    export default {
        name: "msghome",

        data () {
            return  {

                currentMsgHomeComponents:'msg-home-affiche-accueil'
            }
        },

        components: {
            msgHomeAfficheAccueil,msgHomeAfficheCommunaute
        },

        methods: {
            changeCurrentMsgHomeComponent: function(component) {
                this.currentMsgHomeComponents=component;

            }
        }
    }
</script>

<style scoped lang="scss" src="../../../../assets/sass/messagerie/pages/msg-home.scss"></style>
