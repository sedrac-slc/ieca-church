<template>
    <button type="submit" class="flex items-center text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-500 dark:focus:ring-yellow-800"
        :data-modal-target="modal" :data-modal-toggle="modal">
        <i class="bx bx-edit"></i>
        <span>{{ text }}</span>
    </button>
</template>
<script setup>
    defineProps({
        text: { type: String, default() { return "Editar" } },
        modal: { type: String, default() { return "authentication-modal" } },
    })
</script>
