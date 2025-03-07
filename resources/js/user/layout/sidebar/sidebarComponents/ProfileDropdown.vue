<template>
<div x-data="usePopper({placement:'right-end',offset:12})"  class="flex">
    <button x-ref="popperRef" class="avatar size-12 border rounded-full " @click="isShowPopper = !isShowPopper">
        <img class="rounded-full" src="https://raw.githubusercontent.com/w15147m/bootstrap5admindashboardmultiple-main/refs/heads/main/images/app-logo.png" alt="avatar">
        <span class="absolute right-0 size-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
    </button>

    <div v-show="isShowPopper" class="show  popper-root fixed" x-ref="popperRoot">
        <div class="popper-box w-100 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
            <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                <div class="avatar size-14">
                    <img class="rounded-full" src="https://raw.githubusercontent.com/w15147m/bootstrap5admindashboardmultiple-main/refs/heads/main/images/app-logo.png" alt="avatar">
                </div>
                <div>
                    <a href="#" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                        JassaRich
                    </a>
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                        Full-Stack Developer
                    </p>
                </div>
            </div>
            <div class="flex flex-col pt-2 pb-5">
                <div class="mt-3 px-4">
                    <button @click="logout()" class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script setup>
import {
    csrf,
} from "@/config";
import axios from 'axios';
import { ref, onMounted, onBeforeUnmount } from 'vue';

let isShowPopper = ref(false);
const popperRef = ref(null);
const popperRoot = ref(null);

const handleClickOutside = (event) => {
    if (
        isShowPopper.value && 
        popperRef.value && 
        popperRoot.value && 
        !popperRef.value.contains(event.target) && 
        !popperRoot.value.contains(event.target)
    ) {
        isShowPopper.value = false;
    }
};

onMounted(() => {
    window.addEventListener('click', handleClickOutside);
});

onBeforeUnmount(() => {
    window.removeEventListener('click', handleClickOutside);
});

const logout = () => {
    axios.post('/logout', {
        _token: csrf,
    }).then(response => {
        console.log(response);
        window.location.href = '/';
    }).catch(error => {
        console.log(error);
    });
};
</script>


<style lang="scss" scoped>

</style>
