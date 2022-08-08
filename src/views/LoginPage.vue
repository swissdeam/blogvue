<template>
  <main class="form-signin w-100 m-auto">
    <form>
      <!--    <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input v-model="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input v-model="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <!--    <div class="checkbox mb-3">-->
      <!--      <label>-->
      <!--        <input type="checkbox" value="remember-me"> Remember me-->
      <!--      </label>-->
      <!--    </div>-->
      <button @click.prevent="Login" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
    </form>
</main>

</template>

<script>
import axios from "../utils/axios";


export default {
    name: "LoginPage",

    data() {
        return {
            email: null,
            password: null,
        }
    },

    methods: {
        Login() {
            axios.get('/sanctum/csrf-cookie').
            then(() => {
                axios.post('/api/user/login', {email: this.email, password: this.password})
                    .then(response=> {
                        console.log(response, "логин");
                        localStorage.setItem('x_xsrf_token', response.data.Token.plainTextToken)
                        localStorage.setItem('is admin', response.data.is_admin)
                        console.log(response, "логин")
                        this.$router.push({name: 'BlogPage'})
                    })
                    .catch(err => {
                        console.log(err)
                        console.log(err.response)
                    })
            })
        }
    }
}
</script>

<style scoped>

</style>
