import Vue from 'vue'
import Vuex from 'vuex'
import archive from './modules/archive'

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    strict: false,
    modules: {
        archive
    },


})
