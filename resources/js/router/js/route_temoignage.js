import temoignageAdd from '../../components/children/temoignage/modules/temoignageAdd'

import Temoignage from '../../components/master/Temoignage.vue'
import showTemoignage from '../../components/children/temoignage/modules/showTemoignage'


//children
import professional from '../../components/children/temoignage/children/professional';
import amis from '../../components/children/temoignage/children/amis';
/*

import loader from '../../components/children/loader/loader'
import error from '../../components/errors/404'
*/



//add
const personnel =resolve => require(['../../components/children/temoignage/children/temoignageAdd/personnel'],resolve);
const familly =resolve => require(['../../components/children/temoignage/children/familly'],resolve);
const temoigner =resolve => require(['../../components/children/temoignage/children/temoignageAdd/temoigner'],resolve);


let route_temoignage= [

    {
        path: '/temoignage',
        name:'temoignage',
        redirect: '/temoignage/show',
        component:Temoignage,
        children: [

            {
                path:'/temoignage/show',
                component: showTemoignage,
                name:'show',
                sidebar:false,
                redirect:'/temoignage/show/familly',

                        children: [

                            {
                            path:'/temoignage/show/familly',
                            name:'familly',
                            component: familly
                        },

                            {
                                path: '/temoignage/show/professional',
                                name:'professional',
                                component:professional
                            },

                            {
                                path: '/temoignage/show/amis',
                                name:'amis',
                                component:amis
                            }

                        ]


        },



        ]

    }
];



export default route_temoignage
