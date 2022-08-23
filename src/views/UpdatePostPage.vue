<template>
  <main class="form-signin w-100 m-auto">
    <form @submit.prevent="onSubmit">
      <!--    <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">POST EDIT</h1>

      <!--      <div class="form-floating">-->
      <!--        <input v-model="title" type="text" class="form-control" id="floatingInput" placeholder="Title">-->
      <!--        <label for="floatingInput">Title</label>-->
      <!--      </div>-->

      <div class="border-inpt input-group mb-3" style="height: 50px; width: 500px">
        <span class="input-group-text">Title</span>
        <input v-model="title" class="form-control" aria-label="With textarea">
      </div>
      <div class="border-inpt input-group w-50" style="height: 120px;">
        <span class="input-group-text">Text</span>
        <textarea v-model="body" class="form-control" aria-label="With textarea" style="resize: none"></textarea>
      </div>

      <button
          class="pink-btn btn btn-lg mt-4"
          style="background:rgb(239, 154, 154);height: 50px; width: 230px"
          type="submit"
          :disabled="checkNull"
      >
        Done
      </button>
      <p class="mt-5 mb-3 text-muted">by @{{ this.getUserInfo.user.name }}</p>
    </form>
  </main>

</template>

<script>
import {mapActions, mapGetters, mapState} from "vuex";

export default {
  name: "UpdatePostPage",

  data: () => ({
    title: "uwu title",
    body: "uwu body",
  }),

  beforeMount() {
    this.USER_INFO()
    this.SHOW_ONE_POST({post_id: this.$route.params.post_id})
    // this.title = this.getShowOnePost.post.title // TODO: change inputs to actual state (got PROXY response instead object)
  },


  computed: {
    ...mapGetters(["getUpdatePost", "getUserInfo", "getShowOnePost"]),
    ...mapState(["show_one_post"])
  },


  methods: {
    ...mapActions(["USER_INFO", "UPDATE_POST", "SHOW_ONE_POST"]),

    onSubmit() {
      this.UPDATE_POST({post_id: this.$route.params.post_id, title: this.title, body: this.body})
    },


  }


}


</script>

<style>


</style>
