import { createRouter, createWebHashHistory, createWebHistory } from "vue-router"
import auth from "../auth"
import App from "../App.vue"

import Home from "../views/Home.vue"
import Login from "../views/Login.vue"
import Register from "../views/Register.vue"

const routes = [
    {
        path : '/',
        name : 'Home',
        component : Home
    },
    {
        path : '/login',
        name : 'Login',
        component : Login,
        meta : { guestOnly : true }
    },
    {
        path : '/signup',
        name : 'Sign up',
        component : Register,
        meta : { guestOnly : true }
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach(async (to, from, next) => {
    await auth.fetchUser();

    if (to.meta.requiresAuth && !auth.isAuthenticated.value) {
        return next('/login')
      }
      
      if (to.meta.guestOnly && auth.isAuthenticated.value) {
        return next('/')
    }

    next()
})

export default router