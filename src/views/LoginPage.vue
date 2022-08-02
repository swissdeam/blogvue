<template>

    <h1>Страница входа</h1>
    <input v-model="email" type="email" placeholder="email" class="form-control">
    <input v-model="password" type="password" placeholder="password" class="form-control">
    <input @click.prevent="Login" type="submit" value="login" class="btn btn-primary">

</template>

<script>
import axios from "axios";
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
            then(response => {
                console.log(response)
                axios.post('/login', {email: this.email, password: this.password})
                    .then(response=> {
                        console.log(response);
                        localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'])
                        //localStorage.setItem('is admin', res.data.is_admin)
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
