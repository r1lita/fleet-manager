import axios from 'axios'

const state = {
    vehicules: [],
    vehicule: {}
};

const getters = {
    allVehicules: state => state.vehicules,
    getSingleVehicule: state => state.vehicule
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
                  "ordering": false,
                  "info": true,
                  "autoWidth": false,
                });
            });
        });
        //console.log(response.data);
    },
    async getAVehicule({ commit }, vehiculeId) {
        return axios.get('api/vehicules/' + vehiculeId)
        .then(response => {
            commit('setSingleVehicule', response.data);
        });
    },
    async addVehicule({ commit }, vehicule) {
        return axios.post('api/vehicules', vehicule)
        .then(response => {
            commit('newVehicule', response.data);
        });
    },
};

const mutations = {
    setVehicules: (state, vehicules) => (state.vehicules = vehicules),
    setSingleVehicule: (state, vehicule) => (state.vehicule = vehicule),
    newVehicule: (state, vehicule) => state.vehicules.unshift(vehicule),
};

export default {
    state,
    getters,
    actions,
    mutations
  };