<template>

  <div class="showInfoGlobal">


            <b-container>

                <h1>   <i class="small material-icons">featured_video</i> Courrier Envoyés </h1>

                <br>

                <b-row class="row-info" v-for="(element,index) in tabSendCourrier"  :key="index">


                    <b-col md="4" xs="6" lg="4"    sm="6"  xl="4">

                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" :src="pathMiniatureUser + tabInfoUserSend[index].avatar">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">TheProgrammer Forest<i class="material-icons right">more_vert</i></span>
                            <p><a href="#">Courrier pour  {{tabInfoUserSend[index].name}} </a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Details pour {{tabInfoUserSend[index].name}}
                                <i class="material-icons right">close</i></span>

                            <b-row class="w-100" >

                                <b-row class="delive-info w-100">
                                    <b-col cols="6" class="label-expeditor">Destinataire </b-col>
                                    <b-col cols="6" class="label-name-expeditor">{{tabInfoUserSend[index].name}}</b-col>
                                </b-row>

                                <b-row class="delive-info w-100">
                                    <b-col cols="6" class="label-expeditor">Numero</b-col>
                                    <b-col cols="6" class="label-name-expeditor">{{element.numero}}</b-col>
                                </b-row>

                                <b-row class="delive-info w-100">
                                    <b-col cols="6" class="label-expeditor">created ad </b-col>
                                    <b-col cols="6" class="label-name-expeditor">{{element.created_at}}</b-col>
                                </b-row>

                            </b-row>




                        </div>
                    </div>


                    </b-col>







                </b-row>

                <h1> <i class="small material-icons" > headset</i>   Courrier recu</h1>

                <br>
                    <b-row class="row-info">

                    <b-col md="4" xs="6" lg="4"  sm="6"  xl="4">

                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" :src="pathImg + '4.jpg'">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Mozart<i class="material-icons right">more_vert</i></span>
                                <p><a href="#">This is a link</a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>


                    </b-col>



                    <b-col md="4" xs="6" lg="4"  sm="6"  xl="4">
                    <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" :src="pathImg + '4.jpg'">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                                <p><a href="#">This is a link</a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>


                    </b-col>

                    <b-col md="4" xs="6" lg="4"  sm="6"  xl="4">

                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" :src="pathImg + '4.jpg'">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                                <p><a href="#">This is a link</a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>


                    </b-col>







                </b-row>


            </b-container>









  </div>
</template>

<script>
     export default {


         data() {

             return {

                 tabReceivedCourrier: [],
                 tabInfoUserReceived: [],

                 tabInfoUserSend: [],
                 tabSendCourrier: []
             }
         },

         methods: {

             getCourrierSend() {


                 let app =this;
                 axios.get('/courrier/getCourrierSend')
                     .then(e => {


                         app.tabSendCourrier=e.data.getCourrierSend;
                         app.tabInfoUserSend=e.data.getInfoUserSend;


                         console.log(e.data)

                     })
                     .catch(e => {

                         app.redirectError(e)

                     })
             } ,

             getCourrierReceived:function() {

                 let app = this;
                 axios.get('/courrier/getCourrierReceived')
                     .then(e => {
                         app.tabSendCourrier=e.data.tabCourrierSend;


                         console.log(e.data)

                     })
                     .catch(e => {

                         app.redirectError(e)


                     })
             }
         }

         ,

         created(){
             this.getCourrierSend();

         }
     }
</script>

<style lang="scss" scoped src="../../../../assets/sass/profil/components/showAvatarAndInfo.scss"></style>
