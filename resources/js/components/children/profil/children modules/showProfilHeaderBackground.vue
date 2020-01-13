<template>
    <div class="main-first-profil-header">

        <b-container >


            <form style="display:none;position:absolute" >
                <input type="file"  id="avatar" @change="onFileSelected" >
            </form>



            <b-row  align-h="start" align-v="end">

                <b-row class="push-t w-100"  align-h="center">

                    <div class="push-t-avatar">
                        <span v-if="isError">Erreur de validation</span><br>
                        <label for="avatar"><img :src="user.avatar" alt="profil " ></label>
                        <button class="btn-large waves-effect waves-light push-t-button-add" @click="upload" v-if="loaded" type="submit">Message
                            <i class="material-icons right">send</i>
                        </button>
                    </div>

                    <div class="push-t-text">

                        <h1>The Programmer</h1>

                        <h3>Official  welcome !!</h3>
                    </div>

                    <div class="push-t-button">
                        <button class="btn-large waves-effect waves-light  push-t-button-message " type="submit" name="action">Ajouter
                            <i class="material-icons right">add</i>
                        </button>

                        <button class="btn-large waves-effect waves-light push-t-button-add" type="submit" name="action">Message
                            <i class="material-icons right">send</i>
                        </button>

                    </div>

                </b-row>
            </b-row>


        </b-container>


        <div class="footer-profil-header">

            <b-container>


                <b-row align-h="end" align-v="center">

                    <br>
                   <router-link :to="{name:'edit'}">

                       <button class="btn-large waves-effect waves-light" type="submit" name="action">Modifier le profil
                           <i class="material-icons right">send</i>
                       </button>
                   </router-link>

                    <br>


                </b-row>


            </b-container>
        </div>
    </div>
</template>

<script>
    export default {
        name: "showHeaderBackground",


        data() {

            return {

                avatarName:null,
                loaded:false,
                isError: false,
                 error: ''
            }
       }
     ,
        methods: {

            onFileSelected:function(event) {
                console.log(event);
                let image= event.target.files[0];


                this.avatarName= image.name;


                let reader= new FileReader();
                reader.readAsDataURL(image);
                reader.onload= e => {



                   this.user.avatar= e.target.result;

                    this.loaded=!this.loaded;

                };

            },

            upload() {
                let app = this;
                console.log(app.user.avatar)
                axios.post('/profil/avatar', {

                    image: app.user.avatar
                })
                    .then(res => {


                    console.log("ca marche")
                       app.getInfo();
                        app.loaded=!app.loaded;
                    })
                    .catch(function (error) {

                        console.log(error.response)
                    })

            },


        },

        created() {

             this.getInfo();



        }
    }
</script>

<style lang="scss" scoped src="../../../../assets/sass/profil/components/showProfilHeaderBakground.scss"></style>
