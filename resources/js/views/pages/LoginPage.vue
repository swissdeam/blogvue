<template>

    <h1>Страница входа</h1>
    <input v-model="email" type="email" placeholder="email" class="form-control">
    <input v-model="password" type="password" placeholder="password">
    <input @click.prevent="Login" type="submit" value="login" class="btn btn-primary">

</template>

<script>
export default {
    name: "user.login",

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
                axios.post('/login', {email: this.email, password: this.password})
                    .then(res => {
                        localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                        //localStorage.setItem('is admin', res.data.is_admin)
                        this.$router.push({name: 'user.blog'})
                    })
                    .catch(err => {
                        console.log(err.response)
                    })
            })
        }
    }
}
</script>

<style scoped>

</style>
