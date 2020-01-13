
const app_error= require('../../components/App/App-errors');
const error_404 = require('../../components/errors/404');
const error_500 = require('../../components/errors/500');


let route_error= [

    {
        path:'*',
        component: app_error,
        name:'error',
        redirect:'/500',
        children:[
                // for introuvable pages
            {
                path:'/404',
                component:error_404,
                name:'error_404'
            },

            {
                path:'/500',
                component:error_500,
                name:'error_500'
            }

        ]
    }



];

export default route_error;
