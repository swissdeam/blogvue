<template>
    <div class="d-flex align-items-baseline">
      <h4>Name: </h4>
      <h4 class="text-muted ms-1">{{getUserInfo.name}}</h4>
    </div>
    <div class="d-flex align-items-center">
      <h4>Email:</h4>
      <h4 class="text-muted ms-1"> {{getUserInfo.email}}</h4>
    </div>
    <div class="d-flex align-items-center">
      <h4>Role:</h4>
      <h4 class="text-muted ms-1" v-if="getUserInfo.is_admin===1">admin</h4>
      <h4 class="text-muted ms-1" v-else> user</h4>
    </div>
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
