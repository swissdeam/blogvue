<template>
  <div v-if="this.getSearchShowPost.posts.length !== 0">
  <h2 class="mb-5">{{this.getSearchShowPost.user.name}}'s Posts</h2>
    <div  class="col-12 mb-3" v-for="post in reversedPosts()" :key="post.id">
      <div class="card bg-light mb-3" style="width: 75rem;">
        <div class="card-body">
          <h5 class="card-title ">{{post.title}}</h5>
          <p class="card-text mt-5">{{post.body}}</p>
        </div>
    </div>
  </div>
  </div>
  <div v-else>
    <h1>
      This user didn't post anything yet
    </h1>
  </div>
</template>

<script>


import {mapGetters} from "vuex";

export default {


  name: "SearchPosts",

  computed:{
    ...mapGetters(["getUserInfo", "getSearchShowPost"]),

  },

  methods:{
    reversedPosts() {
      console.log(this.getSearchShowPost)
      return this.getSearchShowPost.posts.reverse()
    }


  },
}



</script>

<style scoped>

</style>