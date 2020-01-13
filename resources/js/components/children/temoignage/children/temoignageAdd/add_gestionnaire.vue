<template>

    <div style="margin: auto">


        <b-row class="info-perso-temoignage" align-h="center">

            <form class="col s12 row form" @submit.prevent="register('gestionnaire')" >


                <b-col class="profil" cols="6">

                    <img :src="pathTemoignage + '1.jpg'" alt="image profil" width="100" height="100"><br>

                    choisir profil

                </b-col>

                <b-col cols="6" >

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="nom" type="text" v-model="name" class="validate">
                            <label for="nom" :class="{active: name!==null}" >Nom</label>
                            <span class="errorTemoigner" v-if="hasError && hasErrorName"> {{ errors.name}}</span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s6">
                            <input id="password" type="text" class="validate"  v-model="password">
                            <label for="password" :class="{active: password!==null}" >Mot de passe</label>
                            <span class="errorTemoigner" v-if="hasError && hasErrorPassword"> {{ errors.password}}</span>


                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="telephone" type="number" class="validate"  v-model="telephone">
                            <label for="telephone" :class="{active: telephone!==null}" >Telephone</label>
                            <span class="errorTemoigner" v-if="hasError && hasErrorTelephone"> {{ errors.telephone}}</span>


                        </div>

                    </div>





                    <div class="input-field">
                        <select v-model="sexe">
                            <option disabled  value="">{{ (sexe===0?  "femme" : "homme") || "sexe" }}</option>

                            <option value="0">Homme</option>
                            <option  value="1">Femme</option>

                        </select>
                        <span class="errorTemoigner" v-if="hasError && hasErrorSexe"> {{ errors.sexe}}</span>

                    </div>



                </b-col>

                <b-col cols="12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email"  type="email" class="validate" v-model="email">
                            <label for="email" :class="{active: email!==null}">Email</label>
                        </div>

                    </div>
                    <span class="errorTemoigner" v-if="hasError && hasErrorEmail"> {{ errors.email}}</span>

                </b-col>
                <b-row align-h="end" class="w-100">


                    <button class="btn waves-effect waves-light" type="submit" name="action">
                        Submit
                        <i class="material-icons right">send</i>
                    </button>

                </b-row>
            </form>
        </b-row>



    </div>


</template>

<script>


    import add_member from "./js/add_member";


    export default {

        extends:add_member,



    }
</script>





<style lang="scss" src="../../../../../assets/sass/temoignage/children/personnel.scss"></style>



