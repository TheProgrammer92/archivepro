<template>

    <b-row >

        <router-view></router-view>





    </b-row>
</template>

<script>
    export default {
        name: "Temoignage",

        mounted(){

            this.$parent.$children[0].closeSidebar();
            $('body').css('background-color','white')


            /*$(document).ready(function(){
                $('.tap-target').tapTarget();
            });*/



        },
        methods:{

            close:function () {
                this.$parent.$children[0].closeSidebar();

            }
        },
        beforeRouteLeave(to, from, next) {

            this.close();
            $('body').css('background','#f1f2f7');

            next()
        },

        created() {





        }
    }
</script>

<style scoped>

</style>
