/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('title-bar',require('./components/front/titleBar.vue').default);
Vue.component('info-bar',require('./components/front/infoBar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//import axios from 'axios';
//import VueAxios from 'vue-axios';

//Vue.use(axios);

//window.axios = require("axios"); // it will work without (this). Example: axiom.get(...)

Vue.prototype.axios = axios; // this one is also working. it will work with (this). example: this.axiom(...)

const app = new Vue({
    el: '#app',
});
