/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'bootstrap-vue/dist/bootstrap-vue.css';

window.Vue = require('vue');

import { BootstrapVue } from 'bootstrap-vue';

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
// Vue.use(IconsPlugin)

Vue.component('pricing', require('./components/Pricing.vue').default);
Vue.component('episode', require('./components/Episode.vue').default);
Vue.component('video-player', require('./components/VideoPlayer.vue').default);


const app = new Vue({
    el: '#app',
});
