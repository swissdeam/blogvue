import { createRouter, createWebHistory } from 'vue-router'

import HomePage from "../views/HomePage";
import BlogPage from "../views/BlogPage";
import LoginPage from "../views/LoginPage";
import AdminPanel from "../views/AdminPanel";
import RegistrationPage from "../views/RegistrationPage";
import Get from "../views/Get";


const routes=[
  {
    path: '/get',
    name: 'GetPage',
    component: Get
  },
  {
    path: '/user/blog',
    name: 'BlogPage',
    component: BlogPage
  },
  {
    path: '/home',
    name: 'HomePage',
    component: HomePage
  },
  {
    path: '/user/login',
    name: 'LoginPage',
    component: LoginPage
  },

  {
    path: '/user/registration',
    name: 'RegistrationPage',
    component: RegistrationPage
  },
  {
    path: '/admin',
    name: 'AdminPanel',
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
    if (to.name === 'LoginPage' || to.name === 'RegistrationPage') {
      return next()
    }else{
      return next( {
        name: 'LoginPage'
      })
    }
  }

  if (to.name === 'LoginPage' || to.name === 'RegistrationPage' && token){
    return next({
      name: 'BlogPage'
    })
  }

  next()

});

export default router