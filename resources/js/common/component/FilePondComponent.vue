// FilePondComponent.vue
<template>
<div class="filepond fp-bordered mt-1.5">
    <FilePond name="image" accepted-file-types="image/jpeg, image/png" 
     :files="filePondFiles"
      :allow-multiple="props.multiple"
      @updatefiles="handleFileUpload"
       label-idle="Drop image here or click to browse" />
</div>
</template>

<script setup>
import {
    ref,
    defineEmits,
    watch,
    onMounted
} from 'vue';
import {
    cdnUrl
} from "@/config.js";
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
let props = defineProps({
    image: {
        types: String,
        default: null,
        required: false
    },
    multiple: {
        types: Boolean,
        default: false,
        required: false
    }
    
});



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
onMounted(() => {
    if (props.image) {
    filePondFiles.value = [
      {
        source: `${cdnUrl}/${props.image}`,
      },
    ];
  }
    
})
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
