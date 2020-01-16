<template>
    <!-- Modal -->
    <div class="modal fade" id="modalNotify" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <!--<div class="modal-dialog modal-dialog-centered" role="document">-->
            <!--<div class="modal-content">-->

                <!--<div class="modal-header">-->

                    <!--<h5 class="modal-title" id="exampleModalLongTitle">Zone De Notification</h5>-->

                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                        <!--<span aria-hidden="true">&times;</span>-->
                    <!--</button>-->

                <!--</div>-->
                <!--<div class="modal-body">-->


                        <!--<ul class="collection" v-for="(element, index) in tabCourrier" v-if="tabCourrier.length>0">-->

                            <!--<li class="collection-item avatar">-->
                                <!--<i class="material-icons circle">folder</i>-->
                                <!--<span class="title">De : {{tabExpeditor[index].name}}</span>-->
                                <!--<p>{{element.type}}<br>-->
                                    <!--{{tabExpeditor[index].email}}-->
                                <!--</p>-->
                                <!--<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>-->
                            <!--</li>-->

                        <!--</ul>-->

                    <!--<ul class="collection" v-if="tabCourrier.length<1">-->

                        <!--<h3 style="color:#3498db;border:none;text-align:center">Pas de notification Pour le moment</h3>-->
                    <!--</ul>-->

                <!--</div>-->
                <!--<div class="modal-footer">-->
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    </div>
</template>

<script>
    export default {


        data( ) {

            return {


                tabCourrier: [],
                tabExpeditor: [],

            }
        },

        methods: {


            getNofityCourrier() {

                let app = this;
                axios.get("courrier/getNotifyCourrier")
                    .then(e => {
                       app.tabCourrier=e.data.courrierNotify;
                       app.tabExpeditor= e.data.expediteurInfo;

                    })
                    .catch(error => {


                        app.redirectError(error)

                    })
            }
        },

        created(){
            setInterval(this.getNofityCourrier,2000);

        }
    }
</script>

<style lang="scss" src="../../../assets/sass/notify/notify.scss"></style>
