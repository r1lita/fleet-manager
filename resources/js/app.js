require('./bootstrap');

import Vue from 'vue'

// import App from './vue/app.vue'
Vue.component('site-header', require('./components/SiteHeader.vue').default);
Vue.component('left-sidebar', require('./components/LeftSidebar.vue').default);
Vue.component('home-page', require('./components/app.vue').default);

const app = new Vue({
    el: '#app'
});