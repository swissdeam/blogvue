<template>
  <h1>список пользователей </h1>
  <table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="person in this.getAdmin" v-bind:key="person.id">
      <th scope="row">{{ person.id }}</th>
      <td>{{ person.name }}</td>
      <td>{{ person.email }}</td>
      <td v-if="person.is_admin===1">admin</td>
      <td v-else>user</td>
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
    ...mapGetters(["getCheckAdmin", "getAdmin"]),
  },
  methods: {
    ...mapActions(["CHECK_ADMIN"]),
  }

}
</script>

<style scoped>

</style>
