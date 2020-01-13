
const news =resolve => require(['../../components/master/AddCourriel.vue'],resolve);

let newCourriel = [

    {

        path: '/Nouveau',
        component:news,
        name: 'nouveau',
        meta : {

            auth:true
        }

    }
];

export default newCourriel;
