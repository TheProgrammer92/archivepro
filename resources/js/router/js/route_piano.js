
// all route for path bideo


const pianoVideo =   require('../../components/master/PianoVideo.vue');
const recentSousCat = require('../../components/children/piano/modules/RecentSousCat.vue');
const videoHome=  require('../../components/children/piano/modules/MainPianoComponent');
const video_play= require('../../components/children/piano/modules/programmerCreation');
const video = require('../../components/children/piano/modules/programmerCreation');


let route_piano =   [

            {
                path: '/video',
                name: 'piano',
                component: pianoVideo,
                redirect:'/video/categories'
            },

            {

                path:'/video/categories',
                name:'categories_video',
                component:videoHome,
            },


                 {
                    path:'/video/piano/:idSousCat',
                    name:'recentSousCat',
                    component:recentSousCat
                },

                {
                    path:'/video/piano/:liste/:idPlay',
                    component:video
                }
  ];

export default  route_piano;
