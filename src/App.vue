<template>
    <div class="wrapper">
        <router-link v-if="token" :to="{name: 'GetPage'}">Get</router-link>
        <router-link v-if="!token" :to="{name: 'LoginPage'}">Login</router-link>
        <router-link v-if="!token" :to="{name: 'RegistrationPage'}">Registration</router-link>
        <router-link v-if="token" :to="{name: 'BlogPage'}">Blog</router-link>
        <router-link v-if="token" :to="{name: 'AdminPanel'}">admin</router-link>
        <router-link v-if="token" :to="{name: 'HomePage'}">Home</router-link>
        <a v-if="token" @click.prevent="logout" href=#>Logout</a>
        <main class="container">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
// import Header from "./components/Header";
import axios from "axios";

export default {
    name: "App",
    // components: {Header}


    data() {
        return {
            token: null,
            is_admin: null,
        }
    },

    updated() {
        this.getToken()
        this.getIsAdmin()
    },

    mounted() {
        this.getToken()
        this.getIsAdmin()
    },


    methods: {

        getToken() {
            this.token = localStorage.getItem('x_xsrf_token')
        },

        getIsAdmin() {
            this.is_admin = localStorage.getItem('is admin')
        },


        logout() {
            axios.post('/logout')
                .then(res => {

                    localStorage.removeItem('x_xsrf_token')
                    localStorage.removeItem('is admin')
                    this.$router.push({name: 'user.login'})
                    console.log(res)
                })
        }
    }
}

</script>

<style scoped>

</style>
