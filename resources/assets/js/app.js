
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


Vue.component('friend', require('./components/Friend.vue'));
Vue.component('notification', require('./components/Notification.vue'));

import { store } from './store'

const app = new Vue({
    el: '#app',
    store
});
