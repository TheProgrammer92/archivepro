<template>
    <afficheTemoignage :tabUser="tabUser" :tabTemoignage="tabTemoignage"></afficheTemoignage>

</template>

<script>

    import afficheTemoignage from  './afficheTemoignage';
    export default {
        name: "familly",

        data() {

            return {

                tabUser:[],
                tabTemoignage:[]


            }
        },

        components:{afficheTemoignage},




        mounted() {

            this.getFamilly()

        },



        methods:  {

            getFamilly:function() {

                let app = this;

                axios.get('temoignage/family',{

                    params: {
                        type:"professionnel"
                    }
                })
                    .then(e => {


                        app.tabTemoignage.push(e.data.family);
                        app.tabUser.push(e.data.getUser);



                    })

                    .catch(e => {

                        console.log(e.response)
                    })
            }



        }

    }
</script>
<style lang="scss" src="../../../../assets/sass/temoignage/children/familly.scss" scoped></style>
