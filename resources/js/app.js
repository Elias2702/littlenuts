require('./bootstrap');

window.Vue = require('vue');

Vue.component('add-movie', require('./components/AddMovie.vue').default);
Vue.component('actors-list', require('./components/Actors.vue').default);

const app = new Vue ({
    el: '#app',
});
