<template>
<h1>список пользователей </h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>email</td>
            <td>is admin</td>

        </tr>
        <tr v-for="person in people" v-bind:key="person.id">
            <td>{{person.id}}</td>
            <td>{{person.name}}</td>
            <td>{{person.email}}</td>
            <td>{{ person.is_admin }}</td>

        </tr>
    </table>
</template>

<script>

import axios from "axios";
export default {
    name: "AdminPanel",

    data(){
        return{
            people:null
        }
    },

    mounted() {
        this.getPeople()
    },

    methods: {
        getPeople(){
            axios.get('/api/admin')
                .then(res => {
                    this.people = res.data
                }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
