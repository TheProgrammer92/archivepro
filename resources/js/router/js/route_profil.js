





//children component
const showUserProfil =  require('../../components/children/profil/pages/showUserProfil');
const showPageEdit =   require('../../components/children/profil/pages/showPageEdit');

const editInfo =   require('../../components/children/profil/children modules/editAllProfil.vue');
const editPassword =  require('../../components/children/profil/children modules/editPassword.vue');
const editEmail =  require('../../components/children/profil/children modules/editEmail.vue');







let route_profil = [
    {
        path:'/profil',
            name:'profil',
        component:showUserProfil,
        meta: {
        auth:true
        }

    },


   {
        path:'/profil/edit',
        name:'edit',
        component:showPageEdit,
        redirect:'/profil/editInfo',

        children: [


            {
                path: '/profil/editEmail',
                name:'editEmail',
                component: editEmail,
                meta: {
                    auth:true
                }


            },
            {
                path:'/profil/editInfo',
                name:'editInfo',
                components : {
                    default: editInfo,
                    editInfo: editInfo,

                },
                meta:{
                    auth:true
                }
          },

            {
                path: '/profil/editPassword',
                name:'editPassword',
                components: {
                    editPassword:editPassword
                },
                meta: {
                    auth:true
                }

            }

      ]
   }
   ];

export default route_profil;
