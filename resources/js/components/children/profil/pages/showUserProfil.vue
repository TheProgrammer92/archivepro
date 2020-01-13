<template>

    <div class="container-profil">

        <showProfilHeaderBackground></showProfilHeaderBackground>

        <show-avatar-and-info></show-avatar-and-info>

    </div>

</template>

<script>
    import showAvatarAndInfo from "./../children modules/showAvatarAndInfo"
    import showProfilHeaderBackground from '../children modules/showProfilHeaderBackground.vue';

    export default {

        components:{
            showAvatarAndInfo,
            showProfilHeaderBackground
        }
    }
</script>

<style lang="scss" scoped src="../../../../assets/sass/profil/profil.scss" ></style>
