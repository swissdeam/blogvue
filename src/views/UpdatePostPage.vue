<template>
  <main class="form-signin w-100 m-auto">
    <form v-if="getShowOnePost.post" class="text-center" @submit.prevent="onSubmit">
      <h1 class="h3 mb-3 fw-normal">POST EDIT</h1>
      <div class="border-inpt input-group mb-3" style="height: 50px; width: 500px">
        <span class="input-group-text">Title</span>
        <input v-model="computedTitle" class="form-control" aria-label="With textarea">
      </div>
      <div class="border-inpt input-group w-50" style="height: 200px; width: 500px">
        <span class="input-group-text">Text</span>
        <textarea v-model="computedBody" class="form-control" aria-label="With textarea"
                  style="resize: none"></textarea>
      </div>
      <button
          class="pink-btn btn btn-lg mt-4"
          style="background:rgb(239, 154, 154);height: 50px; width: 230px"
          type="submit"
          :disabled="checkNull"
      >
        Done
      </button>
      <p v-if="getUserInfo.user !== undefined" class="mt-5 mb-3 text-muted">by @{{
          getUserInfo.user.name
        }}</p>
    </form>
  </main>

</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
  name: "UpdatePostPage",
  computed: {
    ...mapGetters(["getUpdatePost", "getUserInfo", "getShowOnePost"]),

    computedTitle() {
      return this.getShowOnePost.post.title
    },
    computedBody() {
      return this.getShowOnePost.post.body
    },
  },


  methods: {
    ...mapActions(["USER_INFO", "UPDATE_POST", "SHOW_ONE_POST"]),

    onSubmit() {
      this.UPDATE_POST({post_id: this.$route.params.post_id, title: this.title, body: this.body})
    },


  },

  beforeMount() {
    this.USER_INFO()
    this.SHOW_ONE_POST({post_id: this.$route.params.post_id})
  },
}


</script>

<style>


</style>
