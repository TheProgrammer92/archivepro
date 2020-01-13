<template>
    <div class="wrapper-caroussel">

        <div class="carousel">




            <a class="carousel-item" href="#"><img :src="pathImg + 'kevine.jpg'"    width="800px" ></a>
            <a class="carousel-item" href="#"><img :src="pathImg + '4.jpg'"   width="800px"></a>
            <a class="carousel-item" href="#"><img :src="pathImg + '3.jpg'"   width="800px"></a>
            <a class="carousel-item" href="#"><img :src="pathImg + 'kevine.jpg'"  width="800px"></a>
            <a class="carousel-item" href="#"><img :src="pathImg + 'jes.jpg'"   width="800px"></a>


        </div>


    </div>


</template>

<script>
    export default {
        name: "carousselVideo"
    }
</script>

<style lang="scss" src="../../../../assets/sass/piano/pages/sassComponent/carousselVideo.scss"></style>
