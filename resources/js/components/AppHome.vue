<template>
    <div>
        <toolbar></toolbar>
        <router-view></router-view>     
        <footerApp></footerApp>
    </div>
</template>

<script>
import toolbar from './toolbar'
import footerApp from './Footer'
import Login from './Login/Login'
export default {
    components:{toolbar,footerApp,Login}
}
</script>

<style>

</style>