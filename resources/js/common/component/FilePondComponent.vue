// FilePondComponent.vue
<template>
  <div class="filepond fp-bordered mt-1.5">
    <FilePond 
      name="image" 
      accepted-file-types="image/jpeg, image/png" 
      allow-multiple="false" 
      :files="filePondFiles" 
      @updatefiles="handleFileUpload" 
      label-idle="Drop image here or click to browse" 
    />
  </div>
</template>

<script setup>
import { ref, defineEmits } from 'vue';
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";

const emit = defineEmits(['file-uploaded']);
const filePondFiles = ref([]);

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);

const handleFileUpload = (files) => {
  if (files.length > 0) {
    emit('file-uploaded', files[0].file);
  } else {
    emit('file-uploaded', null);
  }
};
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
