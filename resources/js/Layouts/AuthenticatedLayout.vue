<template>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <Link :href="route('home')" class="flex ms-2 md:me-24">
                        <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" /> -->
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">IECA</span>
                    </Link>
                </div>
                <div class="flex items-center gap-2 justify-center">
                    <ActionsBar/>
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="@/img/person.jpg" alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-gray-100 divide-y divide-gray-100 rounded shadow dark:bg-gray-800 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{ page.props.auth.user.fullname }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    {{ page.props.auth.user.email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <form @submit.prevent="logout()" class="text-center">
                                        <button type="submit" class="w-5/6 text-red-700 text-sm hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-2 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            <i class="bx bx-sign-out"></i>
                                            <span>logaut</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <Route icon="bx bx-home" text="Página inical" :active="routeActive == NavigatorLink.HOME" />
                </li>
                <li>
                    <Route icon="bx bx-user" link="dashboard" text="Dashboard" :active="routeActive == NavigatorLink.DASHBORAD" />
                </li>
                <li>
                    <Route icon="bx bx-poll" link="permission.index" text="Permissões" :active="routeActive == NavigatorLink.PERMISSION" />
                </li>
                <li>
                    <Route icon="bx bx-hard-hat" link="role.index" text="Cargos" :active="routeActive == NavigatorLink.ROLE "/>
                </li>
                <li>
                    <Route icon="bx bx-group" text="Usuários" />
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64  dark:bg-gray-700 dark:h-screen">
        <div class="p-4 dark:border-gray-300 dark:text-white mt-14">
            <slot/>
        </div>
    </div>

</template>
<script setup>

import { usePage, Link , router} from '@inertiajs/vue3';
import { initFlowbite } from 'flowbite';
import { onMounted } from 'vue';

import ActionsBar from '@/Components/ActionsBar.vue';
import Route from '@/Components/Route.vue';
import NavigatorLink from '@/Models/NavigatorLink';

defineProps({
    routeActive: {type: String, default(){ return NavigatorLink.HOME; }}
})

const page = usePage();

const logout = () => {
    router.post(route('logout'));
};

onMounted(() => {
    initFlowbite();
})
</script>
