import axios from 'axios'

const state = {
    vehicles: [],
    vehicle: {}
};

const getters = {
    allVehicles: state => state.vehicles,
    getSingleVehicle: state => state.vehicle
};

const actions = {
    async fetchVehicles({ commit }) {
        return axios.get('api/vehicles')
        .then(response => {
            commit('setVehicles', response.data);
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
    async getAVehicle({ commit }, vehicleId) {
        return axios.get('api/vehicles/' + vehicleId)
        .then(response => {
            commit('setSingleVehicle', response.data);
        });
    },
    async addVehicle({ commit }, vehicle) {
        return axios.post('api/vehicles', vehicle)
        .then(response => {
            commit('newVehicle', response.data);
        });
    },
};

const mutations = {
    setVehicles: (state, vehicles) => (state.vehicles = vehicles),
    setSingleVehicle: (state, vehicle) => (state.vehicle = vehicle),
    newVehicle: (state, vehicle) => state.vehicles.unshift(vehicle),
};

export default {
    state,
    getters,
    actions,
    mutations
  };