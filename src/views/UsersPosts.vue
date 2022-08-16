<template>
  <div v-if="this.getAdminShowPost.posts.length !== 0">
    <div  class="col-12 mb-3" v-for="post in reversedPosts()" :key="post.id">
      <div  class="card bg-light mb-3" style="width: 75rem;">
        <div class="card-body">
          <h5 class="card-title ">{{post.title}}</h5>
          <p class="card-text mt-5">{{post.body}}</p>
          <button  href="" class="btn btn-outline-primary">edit</button>
          <button v-on:click="this.ADMIN_DELETE_POST({user_id:this.$route.params.user_id, post_id: post.id})" class="btn btn-outline-danger mx-2">delete</button>
        </div>
    </div>
  </div>
  </div>

  <div v-else>
    <div class="h3 mb-3 fw-normal alert alert-info w-50" role="alert">
      USER DIDNT POST ANYTHING YET
    </div>
  </div>

</template>

<script>


import {mapActions, mapGetters} from "vuex";

export default {


  name: "UsersPosts",



  beforeMount() {
  this.ADMIN_SHOW_POST({user_id: this.$route.params.user_id})
  },


  computed:{
    ...mapGetters(["getUserInfo", "getAdminShowPost", "getAdminDeletePost"]),

  },

  methods:{
    ...mapActions(["ADMIN_SHOW_POST", "ADMIN_DELETE_POST"]),
    reversedPosts() {
      console.log(this.getAdminShowPost)
      return this.getAdminShowPost.posts.reverse()
    },
  },
}



</script>

<style scoped>

</style>