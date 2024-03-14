<template>
    <div :id="modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div :class="{
            'relative p-4 w-full max-w-5xl max-h-full': true,
            maxWidth : true
        }">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white"> {{ title }} </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" :data-modal-hide="modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form class="space-y-4" @submit.prevent="$emit('submitted')">
                        <slot />
                        <button type="submit" class="mt-3 px-3 py-2 text-xs font-medium text-center text-white bg-pink-700 rounded-lg hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">
                            <i class="bx bx-check"></i>
                            <span>{{btnConfirmText}}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
    defineProps({
        title: { type: String, default() { return "Adicionar" } },
        text: { type: String, default() { return "Cadastramento" } },
        modal: { type: String, default() { return "authentication-modal" } },
        maxWidth: {type: String, default(){ return "max-w-5xl"}},
        btnConfirmText: { type: String, default() { return "Confirmo" } },
    })
</script>
