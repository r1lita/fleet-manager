import Homepage from './components/Homepage.vue'
import VehiculesList from './components/vehicules/List.vue'
import VehiculeCreate from './components/vehicules/CreateVehicule.vue'
import VehiculeEdit from './components/vehicules/EditVehicule.vue'

const routes = [
    { path: '/', component: Homepage },
    { path: '/vehicules', component: VehiculesList },
    { path: '/vehicules/add', component: VehiculeCreate },
    { path: '/vehicules/edit/:id', name:"editVehicule", component: VehiculeEdit }
    // { path: '/favourite-list', component: FavouriteList },
    // { path: '*', redirect: '/' },
];

export default routes;