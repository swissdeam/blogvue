<template >

  <header style="background: #212121"
      class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom align-center">
      <a href="/"  class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-black text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>

      <ul v-if="getTokenIsAdmin.token" v-bind:key='getTokenIsAdmin.token' class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<!--        <span>{{token}}</span>-->
        <li v-for="link in links"  v-bind:key="link">
          <router-link :to=link.href class="nav-link px-2 link-light">{{ link.title }}</router-link>
<!--          <a :href="link.href" class="nav-link px-2 link-secondary">{{ link.title }}</a>-->
        </li>
        <li class="ms-5">
          <div class="input-group">
            <input v-model="search_email" type="search" class="border-inpt form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button @click="SEARCH_SHOW_POST({email: this.search_email})" type="button" class="btn pink-btn" >search</button>
          </div>
        </li>
      </ul>

      <div class="col-md-4 text-end">
        <router-link v-if="getTokenIsAdmin.token" to='/user/home' class="btn pink-btn me-2" >{{getTokenIsAdmin.name}}</router-link>
        <router-link v-if="!getTokenIsAdmin.token" to='/user/login' class="btn btn-outline-light me-2">Login</router-link>
        <router-link v-if="!getTokenIsAdmin.token" to='/user/register' class="btn btn-outline-light me-2">Sign-up</router-link>
        <router-link v-if="getTokenIsAdmin.is_admin === '1'" to='/adminpanel' class="btn btn-outline-light me-2">Admin Panel</router-link>
        <router-link v-if="getTokenIsAdmin.token" @click.prevent="logout" to=# class="btn btn-outline-secondary me-2">Logout</router-link>
      </div>



  </header>
</template>

<script>

import axios from "axios";
import {mapActions, mapGetters} from "vuex";

export default {
  components: {},

  data() {
    return {
      links: [
        {
          title: "CREATE POST",
          href: "/posts/create"
        },
        {
          title: "MY POSTS",
          href: "/posts"
        },
        {
          title: "FEED",
          href: "/feed"
        },
      ],
      token: null,
      is_admin:null,
      search_email:null,
    }
  },

  mounted(){
    this.getTest()
    this.TOKEN_IS_ADMIN()
  },

  computed:{
    ...mapGetters(["getTokenIsAdmin", "getLogout"]),
  },

  methods:{
    getTest(){
      axios.get('/api/test')
          .then(res=>{
            console.log(res)
          })
    },
    ...mapActions(["LOGOUT", "TOKEN_IS_ADMIN", "SEARCH_SHOW_POST"]),

    logout(){
      this.LOGOUT()
      this.search_email = null
    }

  }

}
</script>

<style scoped>

</style>
