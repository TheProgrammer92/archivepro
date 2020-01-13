<!--affichage des vidéo, chargé, par l'utisateur-->

<template>

    <div>

        <carousselVideo v-if="openCarousselVd"></carousselVideo>


     <div class="container-vd-piano">
        <!--vd= video-->


          <!-- display video-->

            <video-play :video="video" v-if="video!==''"></video-play>

            <!--  display comments video 😁  -->
          <sidebar-recent-video v-if="onMobileSidebar"></sidebar-recent-video>




        <!--sidebar for  display recent video-->



    </div>

    </div>
</template>



<script>

    import moreVideoComponent from '../children modules/moreVideo';
    import videoCommentsComponent from '../children modules/commentsVideo';
    import sidebarRecentVideo from '../children modules/sidebarRecentVideo'
    import videoPlay from '../children modules/videoPlay'
    import carousselVideo from '../children modules/carousselVideo'

    export default {

        data() {

            return {
                openCarousselVd:false,
                onMobileSidebar:true,
                id_video:this.$route.params.idPlay,
                video:''


            }


        },


        components: {
            moreVideoComponent,
            videoCommentsComponent,
            sidebarRecentVideo,
            videoPlay,
            carousselVideo
        },

        mounted(){
            //close sidebar
            this.$parent.openSidebar=false;


        //recuperation de la video pour envoyer au component video
            let video_id=this.$route.params.idPlay;
            let sous_cat_id=this.$route.params.liste;

            let app =this;
           axios.get('video/piano/sousCat/video/play/unique',{

                params:{
                    id_video:video_id,
                    id_sous_cat:sous_cat_id
                }
            })

                .then(function (response) {

                   app.video=response.data.getUniqueVideo[0];

                })
                .catch(function (error) {

                    app.redirectError(error)
                });





            $('.container-home').css('float','none').css('max-width','100%')
        },




        }
</script>


<style scoped lang="scss" src="../../../../assets/sass/piano/pages/programmerCreation.scss" ></style>
