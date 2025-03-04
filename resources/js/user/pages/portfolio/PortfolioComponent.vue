<template>
    <div class="text-3xl font-bold  w-100 text-center p-2">
        Home page
    </div>
    </template>
    
    <script setup>
    import {
        onMounted,
        ref
    } from 'vue';
    import {funcApi} from '../../common/utilities/apiFunctions';
    let data = ref([]);
    const getData = async () => {
      data = await funcApi.fetchData('/api/portfolios');
        console.log(data);
    }
    
    onMounted(() => {
        getData();
    })
    </script>
    
    <style lang="scss" scoped>
    
    </style>
    