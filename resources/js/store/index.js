import Vue from 'vue';
import Vuex from 'vuex';

import vehicles from './modules/vehicles'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        vehicles
    }
});