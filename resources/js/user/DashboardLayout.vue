<template>
        <SidebarComponent />
        <NavbarComponent />
        <main class="main-content w-screen px-[var(--margin-x)] pb-8 w-100">
            <router-view></router-view> 
        </main>
        <!-- <FooterComponent /> -->
</template>

<script>
import FooterComponent from '@/user/layout/FooterComponent.vue';
import SidebarComponent from '@/user/layout/sidebar/SidebarComponent.vue';
import NavbarComponent from '@/user/layout/navbar/NavbarComponent.vue';

export default {
    components: {
        FooterComponent,
        SidebarComponent,
        NavbarComponent,
    },
};
</script>

<style  scoped>
/* Add your styles here if needed */
</style>
