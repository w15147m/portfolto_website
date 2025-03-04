<template>

<FooterComponent/>
<SidebarComponent/>
<NavbarComponent/>
<main class="main-content w-full pb-8" >
    <HomeComponent />
</main>
</template>

<script>
import HomeComponent from '@/user/pages/HomeComponent.vue';
import FooterComponent from '@/user/layout/FooterComponent.vue';
import SidebarComponent from '@/user/layout/sidebar/SidebarComponent.vue';
import NavbarComponent from '@/user/layout/navbar/NavbarComponent.vue';
export default {
    components: {
        HomeComponent,
        FooterComponent,
        SidebarComponent,
        NavbarComponent
    }

}
</script>

<style lang="scss" scoped>

</style>
