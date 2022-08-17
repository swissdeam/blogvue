<template>
  <main class="form-signin w-25 m-auto mt-5">
    <form @submit.prevent="onSubmit">
      <!--    <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

      <div class="form-floating">
        <input v-model="name" type="text" class="border-inpt form-control my-2" id="floatingInput" placeholder="Your Name">
        <label for="floatingInput">Your name</label>
      </div>
      <div class="form-floating">
        <input v-model="email" type="email" class="border-inpt form-control my-2" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input v-model="password" type="password" class="border-inpt form-control my-2" id="floatingInput" placeholder="Password">
        <label for="floatingInput">Password</label>
      </div>
      <div class="form-floating">
        <input v-model="password_confirmation" type="password" class="border-inpt form-control my-2" id="floatingPassword" placeholder="Password Confirmation">
        <label for="floatingPassword">Password Confirmation</label>
      </div>

          <div class="checkbox my-2">
            <label>
              <input v-model="is_admin" type="checkbox" value="Is admin"> I'm admin
            </label>
          </div>
      <button class="w-100 btn btn-lg pink-btn" type="submit">Sign up</button>
      <p class="mt-1 mb-3 text-muted">©swissdeam</p>
    </form>
  </main>

</template>

<script>
import {mapActions, mapGetters} from "vuex";
export default {
    name: "RegistrationPage",

    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            is_admin: false,
        }
    },

  computed:{
    ...mapGetters(["getRegister"])
  },


  methods: {
      ...mapActions(["REGISTER"]),

      onSubmit() {
        this.REGISTER({name: this.name, email: this.email, password: this.password, password_confirmation: this.password_confirmation, is_admin: this.is_admin})
      }
    }
}
</script>

<style scoped>

</style>
