import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import Login from '../components/Login/Login'
import logout from '../components/Login/Logout'
import signup from '../components/Login/signup'
import Forum from '../components/Forum/Forum'

const routes = [
    { path: '/login', component: Login },
    { path: '/logout', component: logout},
    { path: '/signup', component: signup},
    { path: '/forum', component: Forum , name:'forum'},
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
})

export default router