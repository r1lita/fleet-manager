import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

import vehiculesStore from './vehiculesStore'

Vue.use(Vuex)

export default new Vuex.Store({
    vehiculesStore
})