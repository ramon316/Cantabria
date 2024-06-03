/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//sweetalert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Vue from 'vue';

//Ziggy
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue';

Vue.use(ZiggyVue, Ziggy);

window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VueSweetalert2);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('eliminar-cliente', require('./components/EliminarclienteComponent.vue').default);
Vue.component('fullcalendar-component', require('./components/CalendarComponent.vue').default);
Vue.component('eliminar-precio', require('./components/EliminarPrecioComponent.vue').default);
Vue.component('eliminar-evento', require('./components/EliminarEventoComponent.vue').default);
Vue.component('eliminar-proveedor', require('./components/EliminarProveedorComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
