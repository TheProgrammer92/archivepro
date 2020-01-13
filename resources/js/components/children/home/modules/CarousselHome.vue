<template>


        <div class="carousel">




            <a class="carousel-item" href="#"><img :src="pathImg + '3.jpg'"    width="800px" ></a>
            <a class="carousel-item" href="#"><img :src="pathImg + '4.jpg'"   width="800px"></a>
            <a class="carousel-item" href="#"><img :src="pathImg + '3.jpg'"   width="800px"></a>
            <a class="carousel-item" href="#"><img :src="pathImg + 'jes.jpg'"  width="800px"></a>
            <a class="carousel-item" href="#"><img :src="pathImg + 'jes.jpg'"   width="800px"></a>


        </div>



</template>

<script>



    export default {
        data () {
            return {
                slide: 0,
                sliding: null ,
                created:''
            }
        },


        created(){


                    $('.carousel').carousel();

        }
    }
</script>
