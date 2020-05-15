import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import Login from '../components/Login/Login'
import signup from '../components/Login/signup'
const routes = [
    { path: '/login', component: Login },
    { path: '/signup', component: signup},
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
})

export default router