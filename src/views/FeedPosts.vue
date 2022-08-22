<template>
  <div v-if="this.getFeedPost.posts.length !== 0">
    <div  class="col-12 mb-3" v-for="post in reversedPosts()" :key="post.id">
      <div  class="card bg-light mb-3" style="width: 75rem;">
        <div class="card-body">
          <h5 class="card-title ">{{post.title}}</h5>
          <p class="card-text mt-5">{{post.body}}</p>

            <small >
              by <a class="link-primary" v-on:click="SEARCH_SHOW_POST({email:post.user.email})">
              {{post.user.name}} ({{post.user.email}})
            </a> at {{formatDate(post.created_at)}}
            </small>
        </div>
    </div>
  </div>
  </div>

  <div v-else class="text-center">
    <div class="h3 mb-3 fw-normal alert w-100" role="alert">
      No updates
    </div>
    <router-link to="/user/blog/create-post" class="btn pink-btn">wanna create a post?</router-link>
  </div>

</template>

<script>


import {mapActions, mapGetters} from "vuex";


export default {


  name: "FeedPosts",




beforeMount() {
  this.FEED_SHOW_POST()
  },


  computed:{
    ...mapGetters(["getUserInfo", "getFeedPost"]),

  },

  methods:{
    ...mapActions(["FEED_SHOW_POST", "SEARCH_SHOW_POST"]),
    reversedPosts() {
      console.log(this.getAdminShowPost)
      return this.getFeedPost.posts.reverse()
    },

    formatDate(date) {
      return new Date(date).toLocaleString();
    }
  },
}



</script>

<style scoped>

</style>