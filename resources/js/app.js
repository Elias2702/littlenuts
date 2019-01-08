require('./bootstrap');

window.Vue = require('vue');

Vue.component('add-movie', require('./components/AddMovie.vue').default);

const app = new Vue ({
    el: '#app',
});
