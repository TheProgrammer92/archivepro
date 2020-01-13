<template>
    <b-row class="chargement" align-h="center">
        <div class="left">
            <img src="assets/img/logo.png" width="150" height="150">
        </div>
        <span id="l1" style="position:absolute;color:#d8aa46;font-size:40px;margin-top:-7%;margin-left:40%;display:none;">Bonjour ....</span>
px
        <span id="l2" style="position:absolute;color:#d8aa46;font-size:40px;margin-top:-7%;margin-left:40%;display:none;">Veuillez patienter...</span>
px
        <span id="l3" style="position:absolute;color:#d8aa46;font-size:40px;margin-top:-7%;margin-left:40%;display:none;">Prepation du poste...</span>
px
        <span id="l4" style="position:absolute;color:#d8aa46;font-size:40px;margin-top:-7%;margin-left:36%;display:none;">Debut de l'ini</span>
        <span id="l5" style="position:absolute;color:#d8aa46;font-size:40px;margin-top:-7%;margin-left:37%;display:none;">Paramètre avancé...</span>
px
        <span id="l6" style="position:absolute;color:#d8aa46;font-size:40px;margin-top:-7%;margin-left:42%;display:none;">ouverture...</span>

    </b-row>

</template>

<script>
    export default {
        name: "cercleLoader",


        mounted() {

            $(function(){
                $("#l1").fadeIn(1100).delay(1000).fadeOut(500).queue(function(){
                    $("#l2").fadeIn(1100).delay(1000).fadeOut(500).queue(function(){
                        $("#l3").fadeIn(1100).delay(1000).fadeOut(500).queue(function(){
                            $("#l4").fadeIn(1100).delay(1000).fadeOut(500).queue(function(){
                                $("#l5").fadeIn(1100).delay(1000).fadeOut(500).queue(function(){
                                    $("#l6").fadeIn(1100).delay(1200).fadeOut(500).queue(function(){
                                        $(location).attr('href','https://courierpro.local/')
                                    })
                                })
                            })
                        })
                    })
                });
            })
        }
    }
</script>

<style lang="scss">


    body{
        margin:0;
        padding:0;
        overflow-x:hidden;
        overflow-y:hidden;
    }
    .chargement{
        width:100%;
        height:100%;
        background-color: rgb(236, 240, 241);
        line-height:280px;
        position:relative;
        padding-top:10%;
    }

    .left{
        position:relative;
        margin:auto;
        width:150px;
        height:150px;
        border-radius: 100%;
        border:8px solid white;
    }
    .left:after{
        content:'';
        position:absolute;
        top:-8px;left:-6px;right:-6px;bottom:-6px;
        border-radius: 80px;
        border:8px solid transparent;
        border-top-color:#d8aa46;
        animation:junior 1.4s linear infinite;
    }
    @keyframes junior{
        0%{transform:rotate(0deg);}
        100%{transform:rotate(360deg);}
    }

</style>
