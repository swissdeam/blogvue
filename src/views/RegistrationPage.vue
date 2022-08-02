<template>
<h1>регистрация</h1>
    <input v-model="name" type="name" placeholder="name" class="form-control">
    <input v-model="email" type="email" placeholder="email" class="form-control">
    <input v-model="password" type="password" placeholder="password" class="form-control">
    <input v-model="password_confirmation" type="password" placeholder="password_confirmation" class="form-control">
    <input v-model="is_admin"  type="radio" value="yes">
<!--    <input v-model="is_admin" placeholder="yes if admin">-->

    <input @click.prevent="register" type="submit" value="register" class="btn btn-primary">

</template>

<script>
import axios from "axios";
export default {
    name: "RegistrationPage",

    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            is_admin: "no",
        }
    },

    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie')
                .then(res => {
                  console.log(res);
                    axios.post('/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation,
                        is_admin: this.is_admin,

                    })
                        .then(res=>{
                            localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                            console.log(res.data)
                            localStorage.setItem('is admin', this.is_admin)
                            this.$router.push({name: 'BlogPage'})
                        })
                })
        }
    }
}
</script>

<style scoped>

</style>
