<template>
    <div class="col-12 mb-3" v-for="post in reversedPosts()" :key="post.id">
      <div class="card bg-light mb-3" style="width: 75rem;">
        <div class="card-body">
          <h5 class="card-title ">{{post.title}}</h5>
          <p class="card-text mt-5">{{post.body}}</p>
          <button  href="" class="btn btn-outline-primary">edit</button>
          <button v-on:click="DELETE_POST({post_id: post.id})" class="btn btn-outline-danger mx-2">delete</button>
        </div>
    </div>
  </div>
</template>

<script>


import {mapActions, mapGetters} from "vuex";

export default {


  name: "BlogPage",

  beforeMount() {
    this.SHOW_POST()
  },


  computed:{
    ...mapGetters(["getShowPost"]),
  },

  methods:{
    ...mapActions(["SHOW_POST", "DELETE_POST"]),

   reversedPosts() {
     console.log(this.getShowPost)
      return this.getShowPost?.posts.reverse()
    }

  },
}



</script>

<style scoped>

</style>