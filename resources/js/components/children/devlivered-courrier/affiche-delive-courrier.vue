<!--page d'affiche au click du courrier a retirer-->

<template>
    <div class="modal fade" id="modalUpdate"
         style="min-width: 500px;min-height: 400px;width: 50px;height: unset;background:none;box-shadow: none;
"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <b-row class="delive-global-courrier"  >


        <b-row>
            <b-col style="text-align:center">
                <H1 >Retirer</H1>
            </b-col>

        </b-row>

        <b-row class="w-100" v-for="(value,key) in tabInfoCourrierDelive"   :key="key">

            <b-row class="delive-info w-100">
                <b-col cols="6" class="label-expeditor">{{key}}</b-col>
                <b-col cols="6" class="label-name-expeditor">{{value}}</b-col>
            </b-row>

        </b-row>
        <b-row class="delive-info">

            <b-col>
                <a class="waves-effect waves-light btn btn-delive"  @click.prevent="deliveCourrier"><i class="material-icons left">cloud</i>Delivrer</a>

            </b-col>

            <b-col>
                <a class="waves-effect waves-light btn btn-nothing" @click.prevent="closeRetrait" aria-hidden="true" data-dismiss="modal"  data-toggle="modal" ><i class="material-icons left">cloud</i>close</a>

            </b-col>
            <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#modalUpdate" >
                <span aria-hidden="true">&times;</span>
            </button>
        </b-row>





    </b-row>
    </div>
</template>

<script>
    export default {
        props: {
            tabInfoCourrierDelive:Object

        },

        data(){

            return {
                isRetrait:true
            }
        },
        methods: {

                // to delive courrier
            deliveCourrier:function () {

                let element = {

                    //id du courriel

                    id:this.tabInfoCourrierDelive.id
                };

                // procedd to delive courrier
                axios.post("courrier/deliveCourrier",element)
                    .then(function (e) {



                        var toastHTML = '<span>Le courrier a ete delivré</span><button class="btn-flat toast-action">Close</button>';
                        M.toast({html: toastHTML});

                        console.log(e.data)
                    })
                    .catch(error => {

                        console.log(error.response)
                    })
    }


    ,

            closeRetrait:function () {



              this.$parent.showDeliveCourrier();
            }
        },

    }
</script>

<style lang="scss" src="../../../assets/sass/delivered-courriel/affiche-delive-courrier.scss"></style>
