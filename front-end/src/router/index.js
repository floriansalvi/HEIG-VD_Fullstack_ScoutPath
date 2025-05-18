import { createRouter, createWebHashHistory, createWebHistory } from "vue-router"
import auth from "../auth"
import App from "../App.vue"

import Home from "../views/Home.vue"
import Login from "../views/Login.vue"
import Register from "../views/Register.vue"
import Story from "../views/Story.vue"
import Riddle from "../views/Riddle.vue"
import Error404 from "../components/Error404.vue"

/**
 * @type {import('vue-router').RouteRecordRaw[]}
 * Array of route definitions.
 */
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
    },
    {
        path: '/stories/:id',
        name: 'StoryDetail',
        component: Story,
        meta : { requiresAuth : true },
        props: true
    },
    {
        path: '/riddles/:id',
        name: 'Riddle',
        component: Riddle,
        meta : { requiresAuth : true },
        props: true
    },
    {
        path: '/error',
        name: 'Error',
        component: Error404,
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component : Error404
    }
]

/**
 * @type {import('vue-router').Router}
 * Router instance using HTML5 history mode.
 */
const router = createRouter({
    history: createWebHistory(),
    routes
})

/**
 * Navigation guard to handle auth-based route protection.
 * 
 * @param {import('vue-router').RouteLocationNormalized} to
 * @param {import('vue-router').RouteLocationNormalized} from
 * @param {Function} next
 */
router.beforeEach(async (to, from, next) => {
    await auth.fetchUser();

    // Redirect to login if trying to access a protected route without authentication
    if (to.meta.requiresAuth && !auth.isAuthenticated.value) {
        return next('/login')
    }
      
    // Redirect to home if an authenticated user tries to access a guest-only route
    if (to.meta.guestOnly && auth.isAuthenticated.value) {
        return next('/')
    }

    // Otherwise allow navigation
    next()
})

export default router