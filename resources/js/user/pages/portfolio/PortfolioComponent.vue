<template>
<div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 w-full mt-5" >
    <div class="card px-4 pb-4 sm:px-5 ">
        <div class="is-scrollbar-hidden min-w-screen overflow-x-auto">
            <div class="card px-4 pb-4 sm:px-5">
            <div class="my-3 flex h-8 items-center justify-between">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                <span class="pd-x-px-100">Zebra Table</span>
                <span>Zebra Table</span>
              </h2>
            </div>
            <div>
              <div class="mt-5">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  <table class="is-zebra w-full text-left">
                    <thead>
                      <tr>
                        <th class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          #
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Name
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Job
                        </th>
                        <th class="whitespace-nowrap rounded-r-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Favorite Color
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">
                          1
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          Cy Ganderton
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          Quality Control Specialist
                        </td>
                        <td class="whitespace-nowrap rounded-r-lg px-4 py-3 sm:px-5">
                          Blue
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">
                          2
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          Hart Hagerty
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          Desktop Support Technician
                        </td>
                        <td class="whitespace-nowrap rounded-r-lg px-4 py-3 sm:px-5">
                          Purple
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">
                          3
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          Brice Swyre
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          Tax Accountant
                        </td>
                        <td class="whitespace-nowrap rounded-r-lg px-4 py-3 sm:px-5">
                          Red
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">
                          4
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          Marjy Ferencz
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          Office Assistant I
                        </td>
                        <td class="whitespace-nowrap rounded-r-lg px-4 py-3 sm:px-5">
                          Crimson
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           
          </div>
        </div>
    </div>
</div>
</template>

<script setup>
import {
    onMounted,
    ref
} from 'vue';
import {
    funcApi
} from '@/common/utilities/apiFunctions';
let data = ref([]);
const getData = async () => {
    data = await funcApi.fetchData('/api/portfolios');
}

onMounted(() => {
    getData();
})
</script>

<style lang="scss" scoped>

    </style>
