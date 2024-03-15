<template>
    <button type="submit" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-500 dark:focus:ring-red-800"
        :data-modal-target="modal" :data-modal-toggle="modal">
        <i class="bx bx-trash"></i>
        <span>{{ text }}</span>
    </button>
</template>
<script setup>
    defineProps({
        text: { type: String, default() { return "Eliminar" } },
        modal: { type: String, default() { return "authentication-modal" } },
    })
</script>
