



import axios from 'axios';

import Vue from 'vue';

import VueAuth from '@websanova/vue-auth';

import VueAxios from 'vue-axios';

import authConfig from './js/authConfig';


import router from "../../../router/routes"

import VueRouter from "vue-router";




Vue.router=router;

//vue authentication
Vue.use(VueAxios, axios);
axios.defaults.baseURL = '/api';



Vue.use(VueAuth, authConfig);




Vue.use(VueRouter);




