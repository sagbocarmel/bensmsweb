import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);
/*
    Import des composants
 */
import Home from './components/home.vue';
import About from "./components/About";
import Login from "./components/Login";

// 2. Définition des routes
// Chaque route doit être mappée à un composant
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/sms/login',
        name: 'login',
        component: Login
    },
    {
        path:'/sms/about',
        name: 'about',
        component: About
    }
]


export default new VueRouter({
    routes,
    mode: 'history',
    history: true
})