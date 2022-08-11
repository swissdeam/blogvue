<template>
  <main class="form-signin w-100 m-auto">
    <form @submit.prevent="onSubmit">
      <!--    <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">POST CREATION</h1>

<!--      <div class="form-floating">-->
<!--        <input v-model="title" type="text" class="form-control" id="floatingInput" placeholder="Title">-->
<!--        <label for="floatingInput">Title</label>-->
<!--      </div>-->


      <div class="input-group mb-5" style="height: 25px; width: 500px">
        <span class="input-group-text">Title</span>
        <textarea v-model="title" class="form-control" aria-label="With textarea"></textarea>
      </div>
      <div class="input-group w-50 mt-4" style="height: 120px">
        <span class="input-group-text">Text</span>
        <textarea v-model="body" class="form-control" aria-label="With textarea"></textarea>
      </div>

      <button class=" btn btn-lg btn-primary mt-4" style="height: 50px; width: 230px" type="submit">Done</button>
      <p class="mt-5 mb-3 text-muted">by @{{this.getUserInfo.name}}</p>
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

  mounted() {
    this.USER_INFO()
  },

  computed:{
    ...mapGetters(["getCreatePost", "getUserInfo"])
  },


  methods: {
    ...mapActions(["USER_INFO","CREATE_POST"]),

    onSubmit() {
      this.CREATE_POST({user_id: this.getUserInfo.id, body: this.body, title:this.title})
    }
  }
}




</script>

<style scoped>

</style>
