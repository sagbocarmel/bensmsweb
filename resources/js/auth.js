import bearer from '@websanova/vue-auth/drivers/auth/bearer'
import axios from "@websanova/vue-auth/drivers/http/axios.1.x"
import router from '@websanova/vue-auth/drivers/router/vue-router.2.x'

// Auth base configuration some of this options
// can be override in method calls
const config = {
    auth: bearer,
    http: axios,
    router: router,
    tokenDefaultName: 'bensmsweb',
    tokenStore: ['localStorage'],
    rolesVar: 'role',
    registerData: {url: 'bensms/admin/register', method: 'POST', redirect: '/login'},
    loginData: {url: 'bensms/login', method: 'POST', redirect: '', fetchUser: true},
    logoutData: {url: 'bensms/logout', method: 'POST', redirect: '/', makeRequest: true},
    fetchData: {url: 'bensms/user', method: 'GET', enabled: true},
    refreshData: {url: 'auth/refresh', method: 'GET', enabled: true, interval: 30}
}