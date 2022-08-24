<template>
  <div v-if="getShowPost">
    <div v-if="reversedPosts">
      <div class="col-12 mb-3" v-for="post in reversedPosts()" :key="post.id">
        <div class="card bg-light mb-3" style="width: 75rem;">
          <div class="card-body" style="">
            <h5 class="card-title ">
              {{ post.title }}
            </h5>
            <p class="card-text mt-5">
              {{ post.body }}
            </p>
            <div style="margin-bottom: 10px">
              <small>
                at {{ formatDate(post.created_at) }}
              </small>
              <div>
                <small v-if="post.created_at !== post.updated_at" class="text-muted">
                  edited at {{ formatDate(post.updated_at) }}
                </small>
              </div>
            </div>
            <router-link :to="{ name: 'UpdatePostPage', params: { post_id: post.id }}" class="btn btn-outline-primary">
              edit
            </router-link>
            <!--                      <button v-on:click="SHOW_ONE_POST({post_id: post.id})" class="btn btn-outline-danger mx-2">edit</button>-->
            <button v-on:click="DELETE_POST({post_id: post.id})" class="btn btn-outline-danger mx-2">delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center" v-else>
    <div class="h3 mb-3 fw-normal alert w-100" role="alert">
      YOU DID NOT POST ANYTHING YET
    </div>
    <router-link to="/posts/create" class="btn pink-btn">wanna create a post?</router-link>
  </div>
</template>

<script>

import {mapActions, mapGetters} from "vuex";

export default {

  data() {
    return {
      formatDate(date) {
        return new Date(date).toLocaleString();
      }

    }
  },

  name: "BlogPage",

  beforeMount() {
    this.SHOW_POST()
  },


  computed: {
    ...mapGetters(["getShowPost",]),
  },

  methods: {
    ...mapActions(["SHOW_POST", "DELETE_POST", "SHOW_ONE_POST"]),
    reversedPosts() {
      console.log(this.getShowPost)
      return this.getShowPost.posts.reverse()
    }
  },
}

</script>

<style scoped>

</style>