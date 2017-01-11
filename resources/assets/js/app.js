
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.component('init', require('./components/Init.vue'));
Vue.component('feed', require('./components/Feed.vue'));
Vue.component('post', require('./components/Post.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('friend', require('./components/Friend.vue'));
Vue.component('unread', require('./components/UnreadNots.vue'));
Vue.component('notification', require('./components/Notification.vue'));

import { store } from './store'

const app = new Vue({
    el: '#app',
    store
});
