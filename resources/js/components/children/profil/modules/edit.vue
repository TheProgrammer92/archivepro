<template>

    <b-container style="margin-top:40px;">




    <div class="edit">

        <div class="editSidebar">

            <nav>
                <ul>
                    <router-link :to="{name:'editInfo'}">  <li>Modifier le profil</li></router-link>
                    <router-link :to="{ name: 'editPassword'}"><li>Modifier le mot de passe </li> </router-link>
                    <router-link :to="{name: 'editEmail'}">  <li>Email ou texto </li>  </router-link>



                </ul>

            </nav>
        </div>

        <div class="editMain">

            <router-view></router-view>
            <router-view name="editPassword"/>
            <router-view name="editEmail"/>

        </div>



    </div>

    </b-container>
</template>

<script>

    export default {



    }
</script>

<style lang="scss"  src="../../../../assets/sass/profil/components/edit.scss"></style>


