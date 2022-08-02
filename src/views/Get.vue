<template>
    <h1>Get me</h1>
</template>

<script>
import axios from "axios";
export default {
    name: "GetPage",
    mounted() {
      this.getData()
    },

    methods: {
        getData() {
            axios.get('/api/get')
                .then(res=> {
                    console.log(res);
                })
        }
    }
}
</script>

<style scoped>

</style>
