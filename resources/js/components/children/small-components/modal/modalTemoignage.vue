<template>

    <div>

        <!-- Modal Trigger -->


        <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet open">
            <div class="modal-content">
                <temoignage-add></temoignage-add>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
    </div>

</template>

<script>
    import temoignageAdd from "../../temoignage/modules/temoignageAdd"
    export default {
        name: "modalTemoignage",
         components: {
             temoignageAdd
         },

        mounted() {




        }
    }
</script>

<style scoped>

    .modal.bottom-sheet{

        max-height:85%;
    }

    .modal {
        overflow: auto;
    }
</style>
