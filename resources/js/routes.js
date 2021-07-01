import Homepage from './components/Homepage.vue'
import VehiclesList from './components/vehicles/List.vue'
import VehicleCreate from './components/vehicles/CreateVehicle.vue'
import VehicleEdit from './components/vehicles/EditVehicle.vue'

const routes = [
    { path: '/', component: Homepage },
    { path: '/vehicles', component: VehiclesList },
    { path: '/vehicles/add', component: VehicleCreate },
    { path: '/vehicles/edit/:id', name:"editVehicle", component: VehicleEdit }
    // { path: '/favourite-list', component: FavouriteList },
    // { path: '*', redirect: '/' },
];

export default routes;