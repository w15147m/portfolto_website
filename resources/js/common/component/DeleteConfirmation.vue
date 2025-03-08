<template>
<div>
    <teleport to="#x-teleport-target">
        <div v-if="showModal" class=" fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" role="dialog" @keydown.esc="showModal = false">
            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false"></div>

            <div class="w-px-400 relative max-w-md rounded-lg bg-white pt-10 pb-4 text-center transition-all duration-300 dark:bg-navy-700">
                <div class="avatar size-20">
                    <i class="fa-solid fa-trash-can font-90 text-error"></i>
                </div>
                <div class="mt-4 px-4 sm:px-12">
                    <h3 class="text-lg text-slate-800 dark:text-navy-50">
                        Confirmation
                    </h3>
                    <p class="mt-1 text-slate-500 dark:text-navy-200">
                        {{ massageData.massage }} <span class="font-semibold text-error"> {{ massageData.name }} </span>
                    </p>
                </div>
                <div class="my-4  h-px bg-slate-200 dark:bg-navy-500"></div>

                <div class="space-x-5">
                    <button @click="showModal = false" class="btn min-w-[7rem] rounded border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        Cancel
                    </button>
                    <button @click="deleteItem()" class="btn min-w-[7rem] rounded bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        Yes, Delete it!
                    </button>
                </div>
            </div>
        </div>
    </teleport>
</div>
</template>

<script setup>
import {
    ref,
    reactive,
    onMounted,
    onBeforeUnmount,
    defineExpose
} from 'vue';
import {
    getHeader,
} from "@/common/utilities/apiFunctions";
const emit = defineEmits(['update:modelValue']);
import {
    toast
} from "vue3-toastify";
import 'vue3-toastify/dist/index.css';
const showModal = ref(false);
const massageData = reactive({
    name: 'John Doe',
    massage: 'Are you sure you want to delete',
});
const props = defineProps({
    modelValue: {
        type: Array,
        required: true,
    },
   
});
const handleEscape = (event) => {
    if (event.key === 'Escape') {
        showModal.value = false;
    }
};
const openModal = (item, url) => {
    console.log(item);
    
    showModal.value = true;
    massageData.name = item.name;
    massageData.id = item.id;
    massageData.url = url;
}
const deleteItem = () => {
    axios.delete(massageData.url, {
        headers: getHeader(),
    }).then((response) => {
        console.log(response);
        const updatedValue = props.modelValue.filter((item) => item.id !== massageData.id);
        toast.success(response.data.message, {
            position: toast.POSITION.TOP_RIGHT,
        });
        emit('update:modelValue', updatedValue);
        showModal.value = false;

    }).catch((error) => {
        console.log(error);

    });

}
onMounted(() => {
    window.addEventListener('keydown', handleEscape);
});

onBeforeUnmount(() => {
    window.removeEventListener('keydown', handleEscape);
});
defineExpose({
    openModal
});
</script>

<style scoped>
/* Add any custom styles here if needed */
</style>
