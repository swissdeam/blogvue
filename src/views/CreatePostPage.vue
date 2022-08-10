<template>
  <main class="form-signin w-100 m-auto">
    <form @submit.prevent="onSubmit">
      <!--    <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">POST CREATION</h1>

      <div class="form-floating">
        <input v-model="title" type="text" class="form-control" id="floatingInput" placeholder="Title">
        <label for="floatingInput">Title</label>
      </div>
      <div class="form-floating">
        <input v-model="body" type="text" class="form-control" id="floatingInput" placeholder="Your text of post">
        <label for="floatingInput">Your text of post</label>
      </div>

<!--      <div class="checkbox mb-3">-->
<!--        <label>-->
<!--          <input v-model="is_admin" type="checkbox" value="Is admin"> I'm admin-->
<!--        </label>-->
<!--      </div>-->
      <button class="w-100 btn btn-lg btn-primary" type="submit">Done</button>
<!--      <p class="mt-5 mb-3 text-muted">© 2017–2022</p>-->
    </form>
  </main>

</template>

<script>
import {mapActions, mapGetters} from "vuex";
export default {
  name: "CreatePostPage",

  data() {
    return {
      title: null,
      body: null,
      user_id: null,
    }
  },

  computed:{
    ...mapGetters(["getCreatePost", "getUserInfo"])
  },


  methods: {
    ...mapActions(["USER_INFO","CREATE_POST"]),

    onSubmit() {
      this.USER_INFO()
      this.CREATE_POST({user_id: this.getUserInfo.id, body: this.body, title:this.title})
    }
  }
}




</script>

<style scoped>

</style>
