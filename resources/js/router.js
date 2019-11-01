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
    },
    // otherwise redirect to home
    { path: '*', redirect: '/' }
]


export const router =  new VueRouter({
    routes,
    mode: 'history',
    history: true
})

router.beforeEach((to, from, next) => {
    // redirect to login page if not logged in and trying to access a restricted page
    const publicPages = ['/','/sms/login', '/sms/about'];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = localStorage.getItem('user');

    if (authRequired && !loggedIn) {
        return next('/login');
    }
    next();
})
