
require('./bootstrap');

import Vue from 'vue'
import VueRouter from "vue-router";

import auth from './components/children/auth/auth'

import store from './components/store/index';


//for my app
import  App from './App.vue'
import router from './router/routes'
import getInforUser from "./components/global/js/getInfoUser"
import containsMixin from './components/global/js/mixins'


// ----- framework ------  //
//booostrap -vue

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


//for date
import * as moment from 'moment';
import 'moment/locale/pt-br';
import error_404 from './components/errors/404'

import InfiniteLoading from 'vue-infinite-loading';


import Vuex from 'vuex'

Vue.use(Vuex)
//infinite loading

Vue.use(InfiniteLoading);
Vue.use(require('vue-moment'));
Vue.use(BootstrapVue);
Vue.use(VueRouter);

moment.locale('fr');

Vue.mixin(containsMixin);


//load component global
/*

 */



/*Vue.component('App',AsyncComponentGlobal);*/
Vue.component('InfiniteLoading', require('vue-infinite-loading'));




let vm = new Vue({
    el: '#app',

    data:{
       screen:"jesbeer TheProgrammer",
        name:"",
        userName:"",
        telephone:"",
        email:"",
        webSite:"",
        bio:"",
        sexe:"",
        password:"",

    },

    components: {
        App
    },



    router,
    store,

    methods: {

        full:function (element) {

                return (element.requestFullscreen ||
                    element.webkitRequestFullscreen ||
                    element.mozRequestFullScreen ||
                    element.msRequestFullscreen).call(element);

        }
    }


});
