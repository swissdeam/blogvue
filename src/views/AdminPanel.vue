<template>
  <h1>список пользователей </h1>
  <table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Posts</th>
      <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="person in this.getAdmin" v-bind:key="person.id">
      <th scope="row">{{ person.id }}</th>
      <td>{{ person.name }}</td>
      <td>{{ person.email }}</td>
      <td v-if="person.is_admin===1">admin</td>
      <td v-else>user</td>
      <td>
        <button  href="" class="btn btn-success">User's Posts</button>
      </td>
      <td >
        <button v-if="person.id !== getUserInfo.id" v-on:click="DELETE_USER({user_id: person.id, curr_id: getUserInfo.id})" class="btn btn-outline-danger">Delete user</button>
      </td>
    </tr>
    </tbody>
  </table>
</template>

<script>


import {mapActions, mapGetters} from "vuex";


export default {
  name: "AdminPanel",

  mounted() {
    console.log("обновился")
    this.CHECK_ADMIN()
  },


  computed: {
    ...mapGetters(["getCheckAdmin", "getAdmin", "getUserInfo"]),
  },
  methods: {
    ...mapActions(["CHECK_ADMIN", "DELETE_USER"]),
  }

}
</script>

<style scoped>

</style>
