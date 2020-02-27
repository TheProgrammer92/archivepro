import axios from 'axios';

// initial state
const state = {
    isDemanderDevis:false,

    tabArchive:[],
    tabCategorie:[],
    tabService:[],
    countResultSearch:0,
    isOperateArchive:false,
    tabOperateArchive:[]

};


// mutations
const mutations = {

    showOperateArchive (state) {

        console.log("hey mr set show ")

        state.isOperateArchive = !state.isOperateArchive


    },

    setTabOperateArchive(state,value) {


        console.log("set tab operate" , value)

        state.isOperateArchive = !state.isOperateArchive

        state.tabOperateArchive= []
        state.tabOperateArchive.push(value)



    },

    archiveModifystate(state,element) {

        axios.post('/archive/editEtat',element)
            .then(e => {

                console.log(e.data)
                let toastHTML;

                toastHTML='<span>😉Boumm !! Archive !!! </span><button class="btn-flat toast-action">Close</button>';




                M.toast({html: toastHTML});
            })
            .catch(e => {

                console.log(e.response)
            })
    },

  getAllArchive (state) {


        axios.get('archive/getAll')
            .then(e => {

                state.tabArchive = e.data.archive;
                state.tabCategorie = e.data.categorie;
                state.tabService = e.data.service;


            })
            .catch(res => {
                console.log(res.response)

            })
    },


    search(state, element) {



        axios.post("archive/search",element)
            .then(e => {

                state.tabArchive = e.data.archive;
                state.tabCategorie = e.data.categorie;
                state.tabService = e.data.service;
                state.countResultSearch=state.tabSearchArchive.length


            })
            .catch(e => {


                console.log(e)
                console.log("search error")
            })
    }






    };




// actions
const actions = {


    getAllArchive (context) {
        context.commit('getAllArchive')
    },
     searchArchive (context,search) {
        context.commit('search',search)
    },
    archiveModifystate (context,element) {
        context.commit('archiveModifystate',element)
    },

    showOperateArchive (context,element) {
        context.commit('showOperateArchive',element)
    },


    setTabOperateArchive (context,element) {
        context.commit('setTabOperateArchive',element)
    },


};



// getters
const getters = {

    tabArchive: state => state.tabArchive,
    tabService: state => state.tabService,
    tabCategorie: state => state.tabCategorie,
    countResultSearch: state => state.countResultSearch,
    isOperateArchive: state => state.isOperateArchive,
    tabOperateArchive: state => state.tabOperateArchive,


};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
