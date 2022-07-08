<template>
    <h1>Get me</h1>
</template>

<script>
export default {
    name: "get.index",
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
