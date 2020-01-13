<template>


        <form @submit.prevent="update('profil/update')" method="post" class="editMainForm" enctype="multipart/form-data">


            <div class="form-group-TheProgrammer">
                <div class="editMainDivLabel"> <label for="">Nom</label></div>

                <div class="editMainDivInput">
                    <input type="text" placeholder="Modifier le nom"  v-model="name">
                    <span v-if="hasError && hasErrorName"> {{ errors.name}}</span>
                </div>
            </div>
            <div class="form-group-TheProgrammer">
                <div class="editMainDivLabel"><label for="">Nom d'utilisateur</label></div>

                <div class="editMainDivInput">
                    <input type="text" placeholder="nom d'utilisateur"  v-model="userName">
                    <span v-if="hasError && hasErrorUserName"> {{ errors.userName}}</span>
                </div>

            </div>
            <div class="form-group-TheProgrammer">
                <div class="editMainDivLabel"><label for="">site web</label></div>

                <div class="editMainDivInput">
                    <input type="text" placeholder="site web"  v-model="webSite">
                    <span v-if="hasError && hasErrorWebSite"> {{ errors.webSite}}</span>
                </div>

            </div>

            <div class="form-group-TheProgrammer">
                <div class="editMainDivLabel"><label for="">Bio</label></div>

                <div class="editMainDivInput">
                    <textarea name="" id=""  rows="3"  v-model="bio"></textarea>
                    <span v-if="hasError && hasErrorBio"> {{ errors.bio}}</span>
                </div>

            </div>



            <div class="form-group-TheProgrammer">
                <div class="editMainDivLabel"><label for="">sexe</label></div>

                <div class="editMainDivInput">
                    <select   v-model="sexe" >
                        <option disabled value="Choisissez">Choisissez</option>
                        <option value="femme">femme</option>
                        <option value="homme">Homme</option>

                    </select>



                </div>

                <span v-if="hasError && hasErrorSexe"> {{ errors.sexe}}</span>
            </div>


            <div class="form-group-TheProgrammer">
                <div class="editMainDivLabel"><label for="">Telephone</label></div>

                <div class="editMainDivInput">
                    <input type="text" placeholder="telephone"   v-model="telephone">
                </div>

                <span v-if="hasError && hasErrorTel"> {{ errors.tel}}</span>
            </div>

            <div class="form-group-TheProgrammer">



                    <div class="editMainDivLabel" style="border:none"><label for=""></label></div>
                <div class="editMainDivInput">
                    <div class="editMainDivInput">


                        <button type="submit">
                        Valider
                        <img :src="pathIcone + 'crayon1.png'" alt="" width="25" height="25">
                         </button>

                    </div>

                </div>

            </div>





        </form>

</template>

<script src="../js/editAllProfil.js"></script>

<style scoped>

</style>
