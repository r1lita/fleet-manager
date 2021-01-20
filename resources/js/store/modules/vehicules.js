import axios from 'axios'

const state = {
    vehicules: []
};

const getters = {
    allVehicules: state => state.vehicules
};

const actions = {
    async fetchVehicules({ commit }) {
        return axios.get('api/vehicules')
        .then(response => {
            commit('setVehicules', response.data);
            jQuery(function ($) {
                $('#example1').DataTable({
                  "paging": true,
                  "lengthChange": true,
                  "searching": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                });
            });
        });
        //console.log(response.data);
    }
};

const mutations = {
    setVehicules: (state, vehicules) => (state.vehicules = vehicules) 
};

export default {
    state,
    getters,
    actions,
    mutations
  };