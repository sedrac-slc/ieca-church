<template>
    <nav class="bg-white border border-b-pink-500 dark:border-gray-800 dark:bg-pink-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <!-- <img src="@/assets/img/ieca.svg" class="h-8" alt="IECA Logo" /> -->
                <span class="self-center text-pink-500 text-2xl font-semibold whitespace-nowrap dark:text-white">IECA</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 rtl:space-x-reverse">

                <ActionsBar/>

                <Link :href="route('login')" :class="isDark
                    ? 'text-white hover:text-black border border-white hover:bg-white focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2 dark:border-white dark:hover:text-black'
                    : 'text-pink-700 hover:text-white border border-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2 dark:border-pink-400 dark:text-pink-400 dark:hover:text-white dark:hover:bg-pink-500 dark:focus:ring-pink-900'
                " v-if="isLogin">
                    <i class="bx bx-user"></i>
                    <span>Login</span>
                </Link>

                <Link :href="route('register')" :class="isDark
                    ? 'text-white hover:text-black border border-white hover:bg-white focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2 dark:border-white dark:hover:text-black'
                    : 'text-pink-700 hover:text-white border border-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2 dark:border-pink-400 dark:text-pink-400 dark:hover:text-white dark:hover:bg-pink-500 dark:focus:ring-pink-900'
                " v-if="isRegister">
                    <i class="bx bx-user"></i>
                    <span>Cadastramento</span>
                </Link>

                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center  w-10 h-10 justify-center text-sm text-pink-500 rounded-lg md:hidden hover:bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-200 dark:text-pink-400 dark:hover:bg-pink-700 dark:focus:ring-pink-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>

            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                    <NavLink icon="bx bx-home bx-tada-hover" text="Página inicial" href="home" />
                    <NavLink icon="bx bx-comment-edit bx-tada-hover" text="Sobre nós" href="home" />
                    <NavLink icon="bx bx-cog bx-tada-hover" text="Acção missionário" href="home" />
                    <NavLink icon="bx bx-edit bx-tada-hover" text="Publicação" href="home" />
                </ul>
            </div>
        </div>
    </nav>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import { initFlowbite } from 'flowbite';
import { onMounted } from 'vue';
import { useDark } from "@vueuse/core";
import NavLink from '@/Components/NavLink.vue';
import ActionsBar from '@/Components/ActionsBar.vue';

const isDark = useDark();

defineProps({
    isLogin: { type: Boolean, default(){ return true;} },
    isRegister: { type: Boolean, default(){ return true;} }
})

onMounted(() => {
    initFlowbite();
})

</script>
