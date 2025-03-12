<template>
    <div>
        <div class="flex items-center justify-between pt-3">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 ">
                UserExperience
            </h2>
            <SocialLinksModal ref="SocialLinksModals" v-model="data" :portfolio_id="portfolioId  || 0"/>
        </div>
        <div class="card mt-3">
            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table class="is-hoverable w-full text-left">
                    <thead>
                        <tr class="d-flex justify-between">
                            <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th v-for="column in columns" :key="column.key" class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                {{ column }}
                            </th>
                            <th class="whitespace-nowrap text-center rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-y border-transparent " v-for="(item, index) in data" :key="index" style="border-top: 1px solid ;">
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ index + 1 }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5" v-for="column in columns" :key="column.key">
                                {{ item[column] }}
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
        <DeleteConfirmation v-model="data" ref="deleteConfirmation"/>
    </div>
    </template>
    
    <script setup>
    import SocialLinksModal from "./components/SocialLinksModal.vue";
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
    const portfolioStore = usePortfolioStore();
    let data = ref([]);
    let portfolioId = '';
    let columns = ref([ 'platform','url']);
    const getData = async () => {
         portfolioId = portfolioStore.getPortfolioId; 
        if (!portfolioId) {
            await portfolioStore.fetchPortfolio(); 
            portfolioId = portfolioStore.getPortfolioId;
        }
        const response = await funcApi.fetchData(`/api/social-links/portfolio/${portfolioId}`);
        data.value = response;
    };
    const SocialLinksModals = ref(null);
    const deleteConfirmation = ref(null);
    
    function editItem(item) {
        SocialLinksModals.value.openModal(item);
    }
    function deleteItem(item) {
        let url = '/api/social-links/' + item.id;
        item.name = item.platform;
        deleteConfirmation.value.openModal(item, url);
    }
    onMounted(() => {
        
        getData();
    });
    </script>
    
    <style lang="scss" scoped>
    </style>
    