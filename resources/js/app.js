
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


// ##### Vue Form Validation Below ##### 

import {Form, HasError, AlertError} from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// ##### Form Validation Above ##### 


// ##### Sweet Alert Toast Below ##### 
import swal from 'sweetalert2'
window.swal = swal

window.toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  
// ##### Sweet Alert Toast Above ##### 

// ###### ProgressBar Below #######

import VueProgressBar from 'vue-progressbar'

const options = {
  color: 'blue',
  failedColor: '#874b4b',
  thickness: '15px',
  transition: {
    speed: '1.8s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false
}

Vue.use(VueProgressBar, options)

// ###### ProgressBar Above #######


// ###### VueRouter Below #######

import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    // {path: '/dashboard', component:require('./components/Dashboard.vue')}, 
    // {path: '/profile', component:require('./components/Profile.vue')}, 
    // {path: '/users', component:require('./components/Users.vue')}, 
    // {path: '/developer', component:require('./components/Developer.vue')}, 
    {path: '/solicitar-serviço', component:require('./components/RequireServiceForm.vue')}, 
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })

// ###### VueRouter Above #######

// ###### Filters Below #######

// global filter registration
Vue.filter('upFirstLetter', text => {
    return text.charAt(0).toUpperCase() + text.slice(1)
})

import moment from 'moment';
Vue.filter('humanReadableDate', date => {
    return moment(date).format('MMMM Do YYYY, h:mm:ss a')
})

// ###### Filters Above #######


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
