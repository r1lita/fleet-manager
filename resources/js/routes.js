import Homepage from './components/Homepage.vue'
import VehiculesList from './components/vehicules/List.vue'

const routes = [
    { path: '/', component: Homepage },
    { path: '/vehicules', component: VehiculesList }
    // { path: '/list', component: List },
    // { path: '/favourite-list', component: FavouriteList },
    // { path: '*', redirect: '/' },
];

export default routes;