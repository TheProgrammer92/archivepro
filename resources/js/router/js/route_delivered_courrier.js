


//addrequire('../../components/children/auth/modules/MainLogin.vue')
const delivered =require('../../components/children/devlivered-courrier/delivered-courrier');
const DeliveredCourrier =require('../../components/master/DeliveredCourriel');


let route_delivered_courrier= [

    {
        path: '/delivered',
        name:'delivered',
        redirect: '/deliveredCourriel/search',
        component:DeliveredCourrier,
        children: [

            {
                path:'/deliveredCourriel/search',
                component: delivered,
                name:'searchCourrierDelivered',





            },



        ]

    }
];



export default route_delivered_courrier
