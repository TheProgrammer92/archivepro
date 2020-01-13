<template>


    <b-row class="error" >

        <div class="text_404 flipX"><h1> 404</h1></div>

        <div class="text-error flipX">

            Tu fais quoi ici?? fou le camps, #page interdite
        </div>




            <b-form-input class="search_error flipX"
                          type="text"
                          placeholder="Faites une recherche "
            >


            </b-form-input>

       <router-link :to="{name:'home'}">
           <b-button  variant="outline-warning">
               Accueil
           </b-button>
       </router-link>



    </b-row>
</template>



<style scoped lang="scss" src="../../assets/sass/errors/404.scss">

</style>
