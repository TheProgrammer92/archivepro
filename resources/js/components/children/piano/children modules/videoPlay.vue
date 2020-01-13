<template>

    <div class="video">






        <b-row>

            <video autobuffer autoloop loop controls  >
                <!--video is the variable passed by routing-->

                <source :src="pathVideo + video.name_video" type="video/webm">



                <p><a :href="pathVideo + video.name_video">Download this video file.</a></p>


            </video>

        </b-row>

        <b-row  class="info-video">

            <b-row class="w-50">

                <b-col cols="12">
                    <h2>The Programer official</h2>
                </b-col>
                <b-col cols="12">
                    <h2>15599 vues</h2>
                </b-col>
            </b-row>


            <b-row class="" style="width:40%">





                <b-col >

                    <h4>

                        <i class="small material-icons">thumb_up</i>
                        15 k

                    </h4>

                </b-col>

                <b-col >

                    <h4>

                        <i class="small material-icons">thumb_down</i>

                        15 k
                    </h4>
                </b-col>

                <b-col>

                    <h4>

                        <i class="small material-icons">share</i>

                        Partage
                    </h4>

                </b-col>






            </b-row>


        </b-row>

        <sidebarRecentVideo v-if="onMobileSidebarVd"></sidebarRecentVideo>

        <videoCommentsComponent></videoCommentsComponent>
    </div>
</template>

<script>

    import videoCommentsComponent from './commentsVideo';
    import sidebarRecentVideo from './sidebarRecentVideo'


    export default {

        props:{
            video:Object
        },

        components: {
            videoCommentsComponent,
            sidebarRecentVideo
        },

        data() {

          return {

              onMobileSidebarVd:true,

          }
        },

        methods: {
            // pour la sidebar ,histoire de la poositionner correctement au responsive
            resizeSidebarVideo:function () {


                if (window.innerWidth<=1510) {

                    this.onMobileSidebarVd=true;
                    this.$parent.onMobileSidebar=false;
                }
                else {
                    this.onMobileSidebarVd= false;
                    this.$parent.onMobileSidebar=true;
                }
            }

        },
        mounted() {

            this.resizeSidebarVideo();

            window.onresize=this.resizeSidebarVideo;






        },


        }
</script>

<style scoped lang="scss" src="../../../../assets/sass/piano/pages/sassComponent/videoPlay.scss"></style>
