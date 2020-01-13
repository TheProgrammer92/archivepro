<template>



        <b-row class="container-error" align-h="center"  align-v="center" style="min-height: 125px" >

            <b-row class="row-error" align-h="center" v-if="$auth.ready()">

                        <router-view></router-view>
            </b-row>

            <b-row class="row-error" align-h="center"  v-if="!$auth.ready()">

                        Loading... Error
            </b-row>
        </b-row>

</template>

<script>
    export default {
        name: "App-errors"
    }
</script>

<style lang="scss" src="../../assets/sass/App/app_errors.scss">

</style>
