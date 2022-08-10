<template>
<h1>{{getUserInfo.name}}</h1>
<h1>{{getUserInfo.email}}</h1>
<h1 v-if="getUserInfo.is_admin===1">admin</h1>
<h1 v-else>user</h1>

</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "HomePage",

  mounted() {
      this.USER_INFO()
  },


  computed: {
      ...mapGetters(["getUserInfo"])
  },

  methods: {
      ...mapActions(["USER_INFO"])
  }
}

</script>

<style scoped>

</style>
