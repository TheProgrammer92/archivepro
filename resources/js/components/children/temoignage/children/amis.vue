<template>
    <afficheTemoignage :tabUser="tabUser" :tabTemoignage="tabTemoignage"></afficheTemoignage>

</template>

<script>
    import afficheTemoignage from  './afficheTemoignage';

    export default {

        data(){
            return {
                /*recup variable  before entre to this route*/

                tabUser:this.$route.params.tabUser,
                tabTemoignage:this.$route.params.tabTemoignage,
                isShowAllTemoignage:this.$route.params.isShowAllTemoignage,


            }
        },
        components:{afficheTemoignage},

        methods : {

            openTemoignage: function() {

                this.$parent.openTemoignageSelected()
            },


        },


        beforeRouteEnter(to,from, next) {



            let tabTemoignage=[];
            let tabUser= [];


            (function() {
                let app = this;

                axios.get('temoignage/family', {params : {

                        type:"connaissance"
                    }})
                    .then(e => {


                        tabTemoignage.push(e.data.family);
                        tabUser.push(e.data.getUser);




                    })

                    .catch(e => {

                        console.log(e.response)
                    })
            })();

            to.params.tabUser=tabUser;
            to.params.tabTemoignage=tabTemoignage;

            next()



        },


        mounted() {


        }

    }
</script>


<style lang="scss" src="../../../../assets/sass/temoignage/children/familly.scss" scoped></style>
