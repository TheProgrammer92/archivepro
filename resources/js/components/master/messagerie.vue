<template>
    <div class="messagerie">

            <transition name="messagerie">

              <component v-if="isMessagerie" :is="currentComponentMsg"></component>

            </transition>


            <b-col cols="3" class="messagerie-img">

                <span ><img :src="pathIcone + 'messagerie1.png'" @click="this.openMessagerie" alt="messagerie" height="50" width="50"></span>

            </b-col>




    </div>
</template>

<script>

    import msgHome from '../children/messagerie/msg-home'
    import msgMsg from '../children/messagerie/msg-msg'
    export default {

        data() {

            return {
                currentComponentMsg: "msg-home",
                isMessagerie:false
            }
        },

        components: {
            msgHome ,msgMsg
        },
        methods: {

            openMessagerie: function () {

                this.isMessagerie= !this.isMessagerie;
            }
        }


    }
</script>

<style lang="scss" src="../../assets/sass/messagerie/messagerie.scss"></style>
<style>

    .messagerie-enter-active {

        animation: fadeIn .5s;
    }
    .messagerie-enter {
        animation: fadeIn .5s;

    }

    .messagerie-leave-active {
        animation: fadeOut .5s;
    }

</style>
