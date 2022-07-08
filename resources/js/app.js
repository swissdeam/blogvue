/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



import vueRouter from "vue-router";
import Application from "./Application"
import { createApp } from "vue";
import router from "./router";


//window.Vue = require('vue').default;
// import Vue from 'vue';
require('./bootstrap')

const appc = createApp(Application)
appc.use(router).mount("#app")



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursivblтely scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// appc.component('header-vue', require('./components/Header.vue').default);
// appc.component('example-component', require('./components/ExampleComponent.vue').default);
// appc.component('test', require('./components/Test.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



// const app = new Vue({
//     el: "#app",
// });
