<template>
    <div   class="container-profil">
        <Main-first-home></Main-first-home>

        <br>

        <edit-component></edit-component>

    </div>
</template>

<script>
    import editComponent from '../modules/edit'
    import MainFirstHome from '../../home/modules/MainFirstHome.vue'


    export default {
        data(){

            return {


            }
        },
        components:{
            editComponent,
            MainFirstHome
        },
        methods: {

            saveImage:function() {


            }
        }
    }
</script>


<style lang="scss" scoped src="../../../../assets/sass/profil/profil.scss"  ></style>
