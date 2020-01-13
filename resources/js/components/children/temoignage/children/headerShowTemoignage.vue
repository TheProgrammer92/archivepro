<template>


    <div class="main-first-home">

        <b-container >




            <b-row align-h="center">

                <div class="push-t">

                    <h1>The Programmer</h1>

                    <h3>Official  welcome !!</h3>
                </div>
            </b-row>

        </b-container>

        <b-row class="header-bottom" align-h="center">


            <b-container>

                <nav>

                    <ul>
                       <li> <router-link :to="{name:'familly'}">   Famille </router-link> </li>
                       <li> <router-link :to="{name: 'professional'}">   Professionnal</router-link></li>
                       <li> <router-link :to="{name: 'amis'}">   Amis</router-link></li>

                       <li class="float-right"> <a class="modal-trigger" href="#modal1"> <img :src="pathIcone + 'plus.png'" alt="Ajouter un temoignage" width="50" height="50"></a></li>

                    </ul>


                </nav>


            </b-container>
        </b-row>
    </div>
</template>

<script>
    export default {
        name: "headerShowTemoignage"
    }
</script>

<style scoped lang="scss" src="../../../../assets/sass/temoignage/children/headerShowTemoignage.scss"></style>
