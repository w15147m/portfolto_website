<template>
<div>
    <div class="flex items-center justify-between pt-3">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 ">
            Profile
        </h2>
        <PortfolioModal ref="portfolioModal" v-model="data" :portfolio="data.length > 0 ? true : false"/>
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
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Name
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Phone
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Address
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Updated At
                        </th>
                        <th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-y border-transparent" v-for="(item, index) in data" :key="index" > 
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ index + 1}}</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <div class="avatar flex size-10">
                                <img class="mask is-squircle" :src="imgUrl" alt="avatar" />
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                            {{ item.name }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            {{ item.number }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            {{ item.address }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            {{ item.updated_at }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <span>
                                <div class="flex justify-center space-x-2">
                                    <button @click="editItem(item)" class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button @click="deleteItem" class="btn size-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
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
</div>
</template>

<script setup>
import PortfolioModal from "./components/PortfolioModal.vue";
import { onMounted, ref, watch } from "vue";
import { usePortfolioStore } from "@/stores/portfolio";

let imgUrl = ref(
  "https://raw.githubusercontent.com/w15147m/bootstrap5admindashboardmultiple-main/refs/heads/main/images/app-logo.png"
);

const portfolioStore = usePortfolioStore();
const data = ref([]); 

const getData = async () => {
  await portfolioStore.fetchPortfolio(); 
  data.value = [...portfolioStore.getPortfolioData];

};

const portfolioModal = ref(null);
function editItem(item) {
  portfolioModal.value.openModal(item);
}

onMounted(() => {
    
  getData();
});
</script>

<style lang="scss" scoped>
</style>
