<template>
    <b-row class="w-100 div-toast " align-h="center" >

        <div class="alert-add-code" v-if="isShowCode && !isMessage">
            Bonjour Le membre {{name}}   a pour code  : {{  code }}
        </div> <div class="alert-add-code" v-if="isShowCode && isMessage">
            {{message}}
        </div>


    </b-row>
</template>

<script>
    export default {
        name: "toast-show",


        data () {

            return  {
                code :'',
                name: '',
                isShowCode:false,
                message:'',
                isMessage:false
            }
        },

        methods: {

            showCode:function(codes,names) {
                this.code=codes;
                this.name =names;
                this.isShowCode=true;
                let app  = this;
                setInterval(function () {

                    app.isShowCode=false;
                },30000)
            },

            changeIsMessage:function (message) {
                this.isMessage=!this.isMessage;
                this.message=message

                this.isShowCode=true;
                let app  = this;
                setInterval(function () {

                    app.isShowCode=false;
                },30000)
            }
        }
    }
</script>

<style scoped>
    .alert-add-code {


       padding:25px;
       /* background-color:#e74c3c;*/
        background-color:#28a745;
        color:white;
        font-size:22px;
        text-align: center;
        width:100%;
        margin:15px 0;

        border: 2px solid #28a745;

        box-shadow: 8px 8px 12px #28a745

    }

    .div-toast {


        padding:10px 20px;
    }

</style>
