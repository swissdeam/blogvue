import {createRouter, createWebHistory} from 'vue-router';

import HomePage from "./views/pages/HomePage";
import BlogPage from "./views/pages/BlogPage";
import loginPage from "./views/pages/LoginPage";
import AdminPanel from "./views/pages/AdminPanel";
import RegistrationPage from "./views/pages/RegistrationPage";
import Get from "./views/pages/Get";


const routes=[
    {
        path: '/get',
        name: 'get.index',
        component: Get
    },
    {
        path: '/user/blog',
        name: 'user.blog',
        component: BlogPage
    },
    {
        path: '/home',
        name: 'home',
        component: HomePage
    },
    {
        path: '/user/login',
        name: 'user.login',
        component: loginPage
    },

    {
        path: '/user/registration',
        name: 'user.registration',
        component: RegistrationPage
    },
    {
        path: '/admin',
        name: 'admin',
        component: AdminPanel
    }

];

const router = createRouter({
    routes,
    history: createWebHistory(process.env.BASE_URL)
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')

    if (!token) {
        if (to.name === 'user.login' || to.name === 'user.registration') {
            return next()
        }else{
            return next( {
                name: 'user.login'
            })
        }
    }

    if (to.name === 'user.login' || to.name === 'user.registration' && token){
        return next({
            name: 'user.blog'
        })
    }

    next()

});

export default router
