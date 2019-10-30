import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);
/*
    Import des composants
 */
import Home from './components/home.vue';
import About from "./components/About";
import Login from "./components/Login";
import AppDashboard from "./components/dashboard/AppDashboard"

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
        component: Login,
        meta: {
            auth: false
        }
    },
    {
        path:'/sms/about',
        name: 'about',
        component: About
    },
    {
        path: '/sms/dashboard',
        name: 'dashboard',
        component: AppDashboard,
        meta:{
            auth: true
        }
    }
]


export default new VueRouter({
    routes,
    mode: 'history',
    history: true
})