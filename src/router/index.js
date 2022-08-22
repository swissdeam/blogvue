import { createRouter, createWebHistory } from 'vue-router'

import HomePage from "../views/HomePage";
import CreatePostPage from "../views/CreatePostPage";
import LoginPage from "../views/LoginPage";
import AdminPanel from "../views/AdminPanel";
import RegistrationPage from "../views/RegistrationPage";
import Get from "../views/GetPage";
import BlogPage from "../views/BlogPage";
import UsersPosts from "@/views/UsersPosts";
import SearchPosts from "@/views/SearchPosts";
import FeedPosts from "@/views/FeedPosts";
import UpdatePostPage from "@/views/UpdatePostPage";



const routes=[
  {
    path: '/get',
    name: 'GetPage',
    component: Get
  },
  {
    path: '/posts/create',
    name: 'CreatePostPage',
    component: CreatePostPage
  },
  {
    path: '/posts/update/:post_id',
    name: 'UpdatePostPage',
    component: UpdatePostPage
  },
  {
    path: '/user/posts',
    name: 'BlogPage',
    component: BlogPage
  },
  {
    path: '/user/home',
    name: 'HomePage',
    component: HomePage
  },
  {
    path: '/user/login',
    name: 'LoginPage',
    component: LoginPage
  },

  {
    path: '/user/register',
    name: 'RegistrationPage',
    component: RegistrationPage
  },
  {
    path: '/adminpanel',
    name: 'AdminPanel',
    component: AdminPanel
  },
  {
    path: '/admin/:user_id/posts',
    name: 'UsersPosts',
    component: UsersPosts
  },
  {
    path: '/search/:email/posts',
    name: 'SearchPosts',
    component: SearchPosts
  },
  {
    path: '/feed',
    name: 'FeedPosts',
    component: FeedPosts
  },
  {
    path: '/admin/check'
  },
  {
    path: '/admin'
  },


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