<template>
    <header >
        <ul >
            <li v-for="link in links">
                <a :href="link.href" >{{link.title}}</a>
            </li>

        </ul>
    </header>
</template>

<script>
export default {
    data(){
        return{
            links: [
                {
                    title: "главная",
                    href: "/home"
                },
                {
                    title: "блоr",
                    href: "/blog"
                },
                {
                    title: "Логин",
                    href: "/login"
                },
                {
                    title: "админка",
                    href: "/admin"
                },
            ]
        }
    }
}
</script>

<style scoped>

</style>
