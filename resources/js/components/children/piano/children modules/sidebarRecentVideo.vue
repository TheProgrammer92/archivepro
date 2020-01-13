<template>
    <div class="listRecent">


        <div class="header-description">
            <div>

                <h2>Mix :  TheProgrammer forest</h2>
            </div>

            <div>

                <h5>TheProgrammer</h5>
            </div>

            <i class="smal material-icons"  @click='closeCarousselVD' style="cursor: pointer">remove_red_eye</i>




        </div>

        <!--component qui  affihce les video recente-->
        <more-video-component></more-video-component>


    </div>
</template>

<script>
    import moreVideoComponent from '../children modules/moreVideo';



    export default {


        components: {
            moreVideoComponent,

        },

        methods: {

           closeCarousselVD:function() {

               this.$parent.openCarousselVd=!this.$parent.openCarousselVd;

               if (this.$parent.openCarousselVd){

                   $('.container-vd-piano,.list-recent,.video,.header-principal').css('opacity','.2')
               }
           },



        },

        mounted() {




        },

        updated(){
            window.onresize=this.resizeSidebarVideo
        }
    }
</script>

<style lang="scss" src="../../../../assets/sass/piano/pages/sassComponent/sidebarRecentVideo.scss" scoped></style>

