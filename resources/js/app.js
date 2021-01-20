require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

import routes from './routes'
import App from './components/App'

import store from './store/vehiculesStore';

Vue.use(VueRouter);

const router = new VueRouter({
    routes
});

// import App from './vue/app.vue'
// Vue.component('site-header', require('./components/SiteHeader.vue').default);
// Vue.component('left-sidebar', require('./components/LeftSidebar.vue').default);
// Vue.component('home-page', require('./components/app.vue').default);

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store,
    created() {
        this.$store.dispatch('loadAllVehicules')
    },
});