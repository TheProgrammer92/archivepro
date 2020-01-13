


const app_loader = require('../../components/App/App-loader');


let route_loader = [
    {
        path:'/loader',
        name:'loader',
        component:app_loader,
        meta:{
            auth:true
        }

    }
];

export default  route_loader;
