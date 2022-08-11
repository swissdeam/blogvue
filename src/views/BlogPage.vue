<template>
  <div class="row" >
    <div class="col-3 mb-3" v-for="post in this.getShowPost.posts" :key="post.id">
      <div class="card bg-light mb-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{post.title}}</h5>
          <p class="card-text">{{post.body}}</p>
          <a href="#" class="btn btn-primary">edit</a>
          <a href="#" class="btn btn-danger">delete</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


import {mapActions, mapGetters} from "vuex";

export default {
  name: "BlogPage",

  mounted() {
    this.SHOW_POST()
  },

  computed:{
    ...mapGetters(["getShowPost"])
  },

  methods:{
    ...mapActions(["SHOW_POST"])
  }
}



</script>

<style scoped>

</style>