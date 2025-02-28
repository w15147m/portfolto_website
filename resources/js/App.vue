<template>

<FooterComponent/>
<SidebarComponent/>
<NavbarComponent/>
<main class="main-content w-full pb-8" >
    <!-- <HomeComponent /> -->
</main>
</template>

<script>
import HomeComponent from '@/admin/pages/HomeComponent.vue';
import FooterComponent from './admin/layout/FooterComponent.vue';
import SidebarComponent from './admin/layout/SidebarComponent.vue';
import NavbarComponent from './admin/layout/NavbarComponent.vue';
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
