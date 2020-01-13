<template>
    <b-row align-h="center" class="chargement">

        <span id="l1" class="textToLoad">Bonjour ..</span>

        <span id="l2" class="textToLoad">Veuillez patienter...</span>

        <span id="l3" class="textToLoad">Prepatiop des Composant</span>
        <span id="l4" class="textToLoad">Debut de l'initialisation</span>
        <span id="l5" class="textToLoad">Paramettre</span>
        <span id="l6" class="textToLoad">ouverture...</span>


        <div class="left">
            <img :src="pathImg + 'logo.png'" width="150" height="150" style="transform: translateY(-46px);">
        </div>
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
        min-height: 1000px;
        max-height:100%;
        background-color: rgb(236, 240, 241);
        line-height:280px;
        position:relative;
        padding-top:10%;
    }

    .left{
        position: relative;
        margin: auto;
        width: 180px;
        height: 180px;
        border-radius: 100%;
        border: 13px solid white
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

    .textToLoad {

        position: absolute;
        color: rgb(216, 170, 70);
        font-size: 44px;
        margin-top: -41px;
        margin-left: 0;
        display:none;
    }

</style>
