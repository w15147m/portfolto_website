<template>
<div>
    <div class="flex items-center justify-between pt-3">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 ">
            User Projects
        </h2>
        <ProjectsModal ref="educationModal" v-model="data" :skills="skills" :portfolio_id="portfolioId  || 0" />
    </div>
    <div class="card mt-3">
        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
            <table class="is-hoverable w-full text-left">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            #
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Avatar
                        </th>
                        <th v-for="column in columns" :key="column.key" class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            {{ column }}
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            skills
                        </th>
                        <th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500" v-for="(item, index) in data" :key="index">
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ index + 1 }}</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <div class="avatar-group flex ai-center">
                                <div v-for="url in item.images" :key="url.id" class="avatar-container position-relative m-l-px--10 avatar-container'">
                                    <img :src="`${cdnUrl}/${url.image}`" class="avatar-img  min-w-px-50 w-px-50 h-px-50 rounded-full border border-2  border-white object-fit-cove" alt="User Avatar">
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5" v-for="column in columns" :key="column.key">
                            <span v-if="column === 'link'">
                                <a href=" {{ item[column] }}" target="_blank" rel="noopener noreferrer" class=" hover:underline"> {{ item[column] }}</a>
                            </span>
                            <span v-else>
                                {{ item[column] }}
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <span v-for="Skill in skills" :key="Skill.id">
                                <span v-for="rowSkill in item.skills" :key="rowSkill.id" class="">
                                    <div class="badge space-x-2 bg-primary text-white dark:bg-accent m-t-px-2 flex flex-wrap "  v-if="Skill.id === rowSkill.id">
                                        <img class="size-5" :src="imgUrl" alt="">
                                        <span>Primary</span>
                                    </div>
                                </span>
                            </span>
                        </td>

                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <span>
                                <div class="flex justify-center space-x-2">
                                    <button @click="editItem(item)" class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button @click="deleteItem(item)" class="btn size-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </div>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <DeleteConfirmation v-model="data" ref="deleteConfirmation" />
</div>
</template>

<script setup>
import ProjectsModal from "./components/ProjectsModal.vue";
import {
    funcApi
} from "@/common/utilities/apiFunctions";

import {
    onMounted,
    ref
} from "vue";
import {
    usePortfolioStore
} from "@/stores/portfolio";
import DeleteConfirmation from "@/common/component/DeleteConfirmation.vue";
import {
    cdnUrl
} from "@/config.js";
let imgUrl = ref(
    "https://raw.githubusercontent.com/w15147m/bootstrap5admindashboardmultiple-main/refs/heads/main/images/app-logo.png"
);
const portfolioStore = usePortfolioStore();
let data = ref([]);
let skills = ref([]);
let portfolioId = '';

let columns = ref(['name', 'desc', 'link']);
const getData = async () => {
    portfolioId = portfolioStore.getPortfolioId;
    if (!portfolioId) {
        await portfolioStore.fetchPortfolio();
        portfolioId = portfolioStore.getPortfolioId;
    }
    const response = await funcApi.fetchData(`/api/projects/portfolio/${portfolioId}`);
    data.value = response.projects;
    skills.value = response.skills;
    console.log(response);
    
    

};
const educationModal = ref(null);
const deleteConfirmation = ref(null);

function editItem(item) {
    educationModal.value.openModal(item);
}

function deleteItem(item) {
    let url = '/api/projects/' + item.id;
    item.name = item.position;
    deleteConfirmation.value.openModal(item, url);
}
onMounted(() => {

    getData();
});
</script>

<style lang="scss" scoped>
</style>
