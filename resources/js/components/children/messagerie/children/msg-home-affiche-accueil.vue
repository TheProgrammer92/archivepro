<template>
    <b-col class="msg-home-affiche-accueil" >

     <b-row class=" w-100" v-for="element in tabUserAccueil" :key="element.id" @click.prevent="changeCurrentComponentMsg(element)">

         <div class="col s12 m12 row-conversation" >

             <div class="card horizontal">
                 <div class="card-image">
                     <img :src="pathMiniatureUser+ element.avatar" width="70" height="70" style="border-radius:100%">
                 </div>
                 <div class="card-stacked">
                     <div class="card-content">
                         <h2> {{element.name }}</h2>
                         <p>I am a very simple TheProgrammer</p>
                     </div>

                 </div>
             </div>
         </div>

     </b-row>




    </b-col>

</template>

<script>
    export default {
        name: "msg-home-affiche-accueil",

        data() {

            return {

                tabUserAccueil: []
            }

        },

        methods: {

            changeCurrentComponentMsg:function(element) {
                this.$parent.$parent.changeCurrentMsgComponentWrapper('msg-msg-component-wrapper',element)
            },

            affichePageAccueil() {
                let app = this;
                axios.get('/messagerie/showAccueil')
                    .then(e => {

                        app.tabUserAccueil = e.data.userResponse;

                    })
                    .catch(e => {

                        app.redirectError(e)

                    })
            }
        },

        mounted() {



            this.affichePageAccueil()

            setInterval(this.affichePageAccueil,3000);
        }
    }
</script>

<style scoped lang="scss" src="../../../../assets/sass/messagerie/pages/msg-home-affiche-accueil.scss"></style>
