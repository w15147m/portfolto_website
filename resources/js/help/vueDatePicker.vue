<template>
  <VueDatePicker 
     v-model="date" 
     placeholder="Select date" 
     text-input 
     :auto-apply="true" 
  />
</template>

<script setup>
import { ref } from 'vue';

const date = ref();
</script>
