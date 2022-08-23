<template>
  <main class="form-signin w-25 m-auto mt-5">
    <form @submit.prevent="onSubmit">
      <!--    <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input v-model="email" type="email" class="border-inpt form-control my-2 " id="floatingInput"
               placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input v-model="password" type="password" class="border-inpt form-control my-2" id="floatingPassword"
               placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg pink-btn" type="submit">Sign in</button>
      <p class="mt-1 mb-3 text-muted">©swissdeam</p>
    </form>
  </main>

</template>

<script>
import {mapActions, mapGetters} from "vuex";


export default {
  name: "LoginPage",

  data() {
    return {
      email: null,
      password: null,
    }
  },

  computed: {
    ...mapGetters(["getLogin"])
  },

  methods: {
    ...mapActions(["LOGIN"]),


    onSubmit() {
      this.LOGIN({email: this.email, password: this.password})
    }
  },

  mounted() {
  }
}
</script>

<style scoped>

</style>
