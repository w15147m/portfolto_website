<template>
<div>
    <button @click="showModal = true" class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
        Add New
    </button>

    <teleport to="#x-teleport-target">
        <div v-if="showModal" class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" role="dialog" @keydown.esc="closeModal">
            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="closeModal"></div>
            <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700">
                <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        {{ editMode ? 'Edit' : 'Add New' }} Portfolio
                    </h3>
                    <button @click="closeModal" class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form @submit.prevent="submitForm" class="px-4 py-4 sm:px-5">
                    <label class="block">
                        <span>Degree</span>
                        <span class="relative mt-1.5 flex">
                            <input v-model="form.degree" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9" placeholder="Your Name" type="text" />
                            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                                <i class="far fa-user text-base"></i>
                            </span>
                        </span>
                    </label>
                    <label class="block">
                        <span>Institution</span>
                        <span class="relative mt-1.5 flex">
                            <input v-model="form.institution" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9" placeholder="(999) 999-9999" type="tel" />
                            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                                <i class="fa fa-phone"></i>
                            </span>
                        </span>
                    </label>
                    <label class="block">
                        <span>Field of study</span>
                        <span class="relative mt-1.5 flex">
                            <input v-model="form.field_of_study" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9" placeholder="(999) 999-9999" type="tel" />
                            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                                <i class="fa fa-phone"></i>
                            </span>
                        </span>
                    </label>

                    <label class="block">
                        <span>image</span>
                        <div class="card flex justify-center">
                            <DatePicker v-model="date" showButtonBar />
                        </div>
                    </label>
                    <div class="flex justify-start gap-1 ">
                        <button @click="closeModal" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            Cancel
                        </button>
                        <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            {{ editMode ? 'Update' : 'Add' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </teleport>
</div>
</template>

<script setup>
import {
    ref
} from 'vue';
import {
    Form
} from 'vform';
import {
    funcApi
} from "@/common/utilities/apiFunctions";
import DatePicker from 'primevue/datepicker';
const showModal = ref(false);
const editMode = ref(false);
const form = ref(new Form({
    id: '',
    name: '',
    number: '',
    address: '',
    image: null
}));
const props = defineProps({
    modelValue: {
        type: Array,
        required: true,
    },
});
const emit = defineEmits(['update:modelValue']);
const closeModal = () => {
    editMode.value = false;
    showModal.value = false;
    form.value.reset();
};
const openModal = (data) => {
    showModal.value = true;
    editMode.value = true;
    form.value.fill(data);
    console.log(form.value);
};

const handleFileUpload = (event) => {
    form.value.image = event.target.files[0];
};

const submitForm = () => {
    if (editMode.value) {
        funcApi.put(`/api/portfolios/${form.value.id}`, form.value)
            .then((response) => {
                const updatedPortfolio = response.data.portfolio;
                const updatedValue = props.modelValue.map((item) =>
                    item.id === updatedPortfolio.id ? updatedPortfolio : item
                );
                emit('update:modelValue', updatedValue);
                toast.success(response.data.message, {
                    position: toast.POSITION.TOP_RIGHT,
                });
                closeModal();
            });
    } else {
        form.value.post('/api/portfolios')
            .then((response) => {
                const updatedPortfolio = response.data.portfolio;
                const updatedValue = props.modelValue.push(updatedPortfolio);
                emit('update:modelValue', updatedValue);
                toast.success(response.data.message, {
                    position: toast.POSITION.TOP_RIGHT,
                });
                closeModal();
            });
    }

};
defineExpose({
    openModal
});
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
