<template>

  <header
      class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>

      <ul v-if="token" v-bind:key='token' class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<!--        <span>{{token}}</span>-->
        <li v-for="link in links"  v-bind:key="link">
          <router-link :to=link.href class="nav-link px-2 link-secondary">{{ link.title }}</router-link>
<!--          <a :href="link.href" class="nav-link px-2 link-secondary">{{ link.title }}</a>-->
        </li>
      </ul>

      <div class="col-md-3 text-end">

        <router-link v-if="!token" to='/user/login' class="btn btn-outline-primary me-2">Login</router-link>
        <router-link v-if="!token" to='/user/register' class="btn btn-outline-primary me-2">Sign-up</router-link>
        <router-link v-if="token" @click.prevent="logout" to=# class="btn btn-outline-primary me-2">Logout</router-link>
        <router-link v-if="is_admin === '1'" to='/admin' class="btn btn-outline-primary me-2">Admin Panel</router-link>
      </div>
  </header>
</template>

<script>

import axios from "axios";

export default {
  components: {},

  data() {
    return {
      links: [
        {
          title: "get",
          href: "/api/get"
        },
        {
          title: "Blog",
          href: "/user/blog"
        },
        // {
        //   title: "регистрация",
        //   href: "/user/registration"
        // },
        {
          title: "главная",
          href: "/home"
        },
        {
          title: "блоr",
          href: "/blog"
        },
        // {
        //   title: "Логин",
        //   href: "/user/login"
        // },
        // {
        //   title: "админка",
        //   href: "/admin"
        // },
      ],
      token: null,
      is_admin:null,
    }
  },

  mounted(){
    this.getToken()
    this.getIsAdmin()
    this.getTest()
    this.getIsAdmin()
  },

  computed() {
    this.token = localStorage.getItem('x_xsrf_token')
    this.is_admin = localStorage.getItem('is admin')
  },

  methods:{
    getToken(){
      this.token=localStorage.getItem('x_xsrf_token')
    },
    getIsAdmin(){
      this.is_admin = localStorage.getItem('is admin')
    },

    getTest(){
      axios.get('/api/test')
          .then(res=>{
            console.log(res)
          })
    },

    logout(){
      axios.post('/api/logout')
          .then(res=> {
            localStorage.removeItem('x_xsrf_token')
            localStorage.removeItem('is admin')
            this.$router.push({name: 'LoginPage'})
            this.getToken()
            this.getIsAdmin()
            console.log(res)
          })
    }
  }

}
</script>

<style scoped>

</style>
