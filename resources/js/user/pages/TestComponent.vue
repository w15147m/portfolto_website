<template>
  <div class="card flex justify-center">
      <DatePicker v-model="date" showButtonBar />
  </div>
</template>

<script setup>

import DatePicker from 'primevue/datepicker';
import { ref } from "vue";

const date = ref();
</script>