import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
//import notes from '../api';

Vue.use(Vuex);

const vehiculesStore = new Vuex.Store({
    state: {
        vehicules: []
    },
    mutations: {
        updateAllVehicules(state, vehicules) {
            state.vehicules = vehicules;
            console.log('updateAllVehicules from mutation')
        }
    },
    actions: {
        loadAllVehicules({ commit }) {
            return axios.get('api/vehicules')
                .then(response => {
                    commit('updateAllVehicules', response.data)
                    jQuery(function ($) {
                        // $("#example1").DataTable({
                        // "responsive": true,
                        // "autoWidth": false,
                        // });
                        $('#example1').DataTable({
                          "paging": true,
                          "lengthChange": true,
                          "searching": true,
                          "ordering": true,
                          "info": true,
                          "autoWidth": false,
                        });
                    });
                })
                console.log(response)
                console.log('loadAllVehicules from actions')
        }
    }
});

export default vehiculesStore;