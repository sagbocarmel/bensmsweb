<template>

    <div>
        <header-bar/>
        <side-bar />
        <footer-bar/>
    </div>

</template>

<script>
    import  HeaderBar from '../wrapper/HeaderBar'
    import  FooterBar from '../wrapper/FooterBar'
    import  SideBar   from '../wrapper/SideBar'
    export default {
        name: "Dashboard",
        components:{
            HeaderBar,
            SideBar,
            FooterBar
        }
    }
</script>

<style scoped>

</style>