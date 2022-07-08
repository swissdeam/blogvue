<template>
    <div class="wrapper">
        <router-link v-if="token" :to="{name: 'get.index'}">Get</router-link>
        <router-link v-if="!token" :to="{name: 'user.login'}">Login</router-link>
        <router-link v-if="!token" :to="{name: 'user.registration'}">Registration</router-link>
        <router-link v-if="token" :to="{name: 'user.blog'}">Blog</router-link>
        <router-link v-if="token" :to="{name: 'admin'}">admin</router-link>
        <router-link v-if="token" :to="{name: 'home'}">Home</router-link>
        <a v-if="token" @click.prevent="logout" href=#>Logout</a>
        <main class="container">
            <router-view></router-view>

        </main>
    </div>
</template>

<script>
// import Header from "./components/Header";

export default {
    name: "Application",
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
                })
        }
    }
}

</script>

<style scoped>

</style>
