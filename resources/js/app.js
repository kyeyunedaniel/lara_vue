/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



import { createApp } from 'vue';
// import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css'
import './bootstrap';
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import { createRouter, createWebHistory } from 'vue-router' 
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
  components,
  directives,
})

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

// const vuetify = new Vuetify();
const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import UserComponent from './components/UserComponent.vue';
import BetComponent from './components/BetComponent.vue';
import AccountComponent from './components/AccountComponent.vue';
import NavigationBar from './components/NavigationBar.vue';


import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import { TailwindPagination } from 'laravel-vue-pagination';

app.component('example-component', ExampleComponent);
// app.component('create-component',CreateComponent );
app.component('user-component',UserComponent);
app.component('bet-component',BetComponent);
app.component('navigation-bar', NavigationBar);
// app.component('account-componen', AccountComponent);
// app.use(Vuetify); 
// app.component('pagination',);

const routes = [ 
  { path: '/home', component:CreateComponent, name:'home', meta:{needsAuth:false}},
  { path: '/posts', component:ExampleComponent, meta:{needsAuth:false} },
  {path:'/account',component:AccountComponent, name:'account', meta:{needsAuth:false} }
  // { path: '/login', name: 'login' }
] 

const router = createRouter({ 
  history: createWebHistory(),
  routes
}) 
router.beforeEach((to, from, next)=>{
  if(to.meta.needsAuth){
    next("/login")
  } else{
    next()
  }
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.use(vuetify).use(router).mount('#app');
