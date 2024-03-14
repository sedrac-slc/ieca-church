<template>
    <button type="button" class="text-pink-700 hover:text-white border border-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2 dark:border-pink-500 dark:text-pink-500 dark:hover:text-white dark:hover:bg-pink-500 dark:focus:ring-pink-800"
        :data-modal-target="modal" :data-modal-toggle="modal">
        <i class="bx bx-plus"></i>
        <span>{{ text }}</span>
    </button>
</template>
<script setup>
    defineProps({
        text: { type: String, default() { return "Adicionar" } },
        modal: { type: String, default() { return "authentication-modal" } },
    })
</script>
