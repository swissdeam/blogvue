<template>
  <div v-if="this.getSearchShowPost.posts.length !== 0">
    <h2 class="mb-5">{{ this.getSearchShowPost.user.name }}'s Posts</h2>
    <div class="col-12 mb-3" v-for="post in this.reversedPosts()" :key="post.id">
      <div class="card bg-light mb-3" style="width: 75rem;">
        <div class="card-body">
          <h5 class="card-title ">{{ post.title }}</h5>
          <p class="card-text mt-5">{{ post.body }}</p>
          <div style="margin-bottom: 10px">
            <small>
              at {{ formatDate(post.created_at) }}
            </small>
            <div>
              <small v-if="post.created_at !== post.updated_at" class="text-muted">
                edited
              </small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-else class="text-center">
    <div class="h3 mb-3 fw-normal alert w-100" role="alert">
      {{ this.getSearchShowPost.user.name }} DID NOT POST ANYTHING YET
    </div>
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

  beforeMount() {
    this.SEARCH_SHOW_POST({email: this.$route.params.email})
  },

  name: "SearchPosts",

  computed: {
    ...mapGetters(["getSearchShowPost"]),

  },

  methods: {

    ...mapActions(["SEARCH_SHOW_POST"]),
    reversedPosts() {
      console.log(this.getSearchShowPost)
      return this.getSearchShowPost.posts.reverse()
    }


  },
}


</script>

<style scoped>

</style>