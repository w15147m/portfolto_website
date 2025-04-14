<template>
<div>
    <button @click="showModal = true" class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
        Add New
    </button>
    <teleport to="#x-teleport-target">
        <div v-if="showModal" class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" role="dialog" @keydown.esc="closeModal">
            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="closeModal"></div>
            <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700 max-w-px-785 min-w-px-785">
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
                <form @submit.prevent="submitForm" class="px-4 py-4 grid grid-cols-2 gap-2">
                    <div class="">
                        <label class="block">
                            <span>Image</span>
                            <FilePondComponent :image="form.image" :multiple=true @file-uploaded="handleFileUpload" />
                        </label>
                    </div>
                    <div class="">
                        <label class="block">
                            <span>Project Name</span>
                            <span class="relative mt-1.5 flex">
                                <input v-model="form.name" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9" placeholder="Skill Name" type="text">
                                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-bars-progress"></i>
                                </span>
                            </span>
                        </label>
                        <label class="block">
                            <span>Project link</span>
                            <span class="relative mt-1.5 flex">
                                <input v-model="form.link" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9" placeholder="Skill Name" type="text">
                                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-link"></i>
                                </span>
                            </span>
                        </label>
                        <label class="block">
                            <span>Description</span>
                            <multiselect id="tagging" v-model="selectedSkills" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="name" :options="props.skills" :multiple="true" :taggable="true"></multiselect>
                        </label>
                        <label class="block">
                            <span>Description</span>
                            <textarea v-model="form.desc" rows="4" placeholder="Description" class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5"></textarea>
                        </label>
                        <span>Old Images</span>
                        <div class=" max-h-px-175" style="overflow-y: scroll;">
                            <ul class="space-y-3.5 font-inter font-medium">
                                <li v-for="row in oldImages" :key="row.id">
                                    <div class="flex justify-between ai-center">
                                        <div class="avatar size-18 h-px-50 w-px-50">
                                            <img class="rounded-full" :src="`${cdnUrl}/${row.image}`" alt="avatar">
                                        </div>
                                        <h3>{{ row.image.split('_').pop() }}</h3>
                                        <button type="button" @click="imageToDelete(row)" class="btn size-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="flex justify-end gap-1 align-items-center  m-t-px-20">
                            <button @click="closeModal" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                Cancel
                            </button>
                            <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                {{ editMode ? 'Update' : 'Add' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </teleport>
</div>
</template>

<script setup>
import {
    ref,
} from 'vue';

import {
    Form
} from 'vform';
import {
    toast
} from "vue3-toastify";
import 'vue3-toastify/dist/index.css';
import {
    funcApi
} from "@/common/utilities/apiFunctions";
import {
    cdnUrl
} from "@/config.js";
import FilePondComponent from "@/common/component/FilePondComponent.vue";
import Multiselect from 'vue-multiselect';
const props = defineProps({
    modelValue: {
        type: Array,
        required: true,
    },
    portfolio_id: {
        type: Number,
        default: 0,
    },
    skills: {
        type: Array,
        default: () => [],
    },
});
const showModal = ref(false);
const editMode = ref(false);

const form = ref(new Form({
    id: '',
    name: '',
    link: '',
    desc: '',
    image: [],
    image_t0_delete: [],
}));
const oldImages = ref([]);
const selectedSkills = ref([]);
const emit = defineEmits(['update:modelValue']);

const imageToDelete = (dataToDelete) => {
    if (!form.value.image_t0_delete) {
        form.value.image_t0_delete = [];
    }
    form.value.image_t0_delete.push(dataToDelete.image);
    oldImages.value = oldImages.value.filter((item) => item.id !== dataToDelete.id);
    console.log(dataToDelete.image);

}

const closeModal = () => {
    editMode.value = false;
    showModal.value = false;
    form.value.reset();
};
const openModal = (data) => {
    oldImages.value = data.images;
    showModal.value = true;
    editMode.value = true;
    form.value.fill(data);
};

const handleFileUpload = (file) => {
    if (!Array.isArray(form.value.image)) {
        form.value.image = [];
    }
    form.value.image.push(file);

};

const submitForm = () => {
    form.value.portfolio_id = props.portfolio_id;
    const formData = new FormData();
    formData.append("id", form.value.id);
    formData.append("portfolio_id", form.value.portfolio_id);
    formData.append("name", form.value.name);
    formData.append("link", form.value.link);
    formData.append("desc", form.value.desc);
    selectedSkills.value.forEach((skill) => {
        formData.append("skills[]", skill.id);
    });
    formData.append("image_t0_delete", form.value.image_t0_delete);
    if (form.value.image && Array.isArray(form.value.image)) {
        form.value.image.forEach((file) => {
            formData.append("images[]", file);
        });
    }
    if (editMode.value) {
        funcApi.post(`/api/projects/update/project/${form.value.id}`, formData)
            .then((response) => {
                const updatedProject = response.data.project;
                const updatedValue = props.modelValue.map((item) =>
                    item.id === updatedProject.id ? updatedProject : item
                );
                emit('update:modelValue', updatedValue);
                toast.success(response.data.message, {
                    position: toast.POSITION.TOP_RIGHT,
                });
                closeModal();
            });
    } else {
        funcApi.post('/api/projects', formData)
            .then((response) => {
                const NewAddProject = response.data.project;
                const NewAddValue = props.modelValue.unshift(NewAddProject);
                // emit('update:modelValue', updatedValue);
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
.modal {
    --bs-modal-zindex: 1055;
    --bs-modal-width: 800px;
}
</style>
