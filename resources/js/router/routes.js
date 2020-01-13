import VueRouter from "vue-router";

//component APP

const app_global = require('../components/App/App_global');


// for home page

import homes from '../router/js/route_home'
//for video
import route_piano from './js/route_piano';

//for user profil and udpate  profil
import route_profil from  './js/route_profil';

//for authentication
import route_auth from './js/route_auth'

//for error
import route_error from  './js/route_error';



//for temoignage

import route_temoignage from './js/route_temoignage';



//for add news couriel

import route_addCouriel from './js/route_add-couriel';

//for route delivered courriel


import route_delivered_courrier from './js/route_delivered_courrier'


//loader

import route_loader from './js/route_app_loader';

//children route for home
let children = [];
const childrenRoute=children.concat(route_piano,route_profil,homes,route_temoignage,route_addCouriel,route_delivered_courrier);


const route =  [{

    path: '/',
    name: 'home',

    component: app_global,
    redirect:'/home',
    isShowCompnent: {   // qui verifie si on va afficher certain component, dans la page suivante

        sidebar:false
    },

    meta :{


    },

    children: childrenRoute

   },

];

let routes=route.concat(route_auth,route_loader,route_error);


const router = new VueRouter({

    history: true,
    mode: 'history',
    routes,
});





export default router;

