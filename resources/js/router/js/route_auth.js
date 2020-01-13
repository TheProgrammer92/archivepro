
const login =   require('../../components/children/auth/modules/MainLogin.vue');
const register =  require('../../components/children/auth/modules/MainRegister.vue');

const app_auth = require('../../components/App/App-auth.vue');


let route_auth = [
    {
        path:'/auth',
        name:'auth',
        component:app_auth,
        meta:{
            auth:false
        },
        children:[
            {
                path:'/auth/login',
                name:'login',
                component: login,
                meta: {
                    auth:false
                }
            },
            {
                path: '/auth/register',
                name:'register',
                component:register,
                meta: {
                    auth:false
                }
            }
        ]
    }
];

export default  route_auth;
