<template>
    <b-container>
        <default-header-bar />
        <default-footer-bar />
    </b-container>
</template>

<script>
    import  DefaultHeaderBar from '../wrapper/DeFaultHeaderBar'
    import  DefaultFooterBar from '../wrapper/DefaultFooterBar'
    export default {
        name: "NoDashBoard",
        components:{
            DefaultFooterBar,
            DefaultHeaderBar
        }
    }
</script>

<style scoped>

</style>