<template>
    <label :for="name" class="block mb-2 text-sm font-medium text-red-900 dark:text-white">
        <i class="bx bx-error text-pink-500"></i>
        <span>{{ text }}</span>
    </label>
</template>
<script setup>
defineProps({
    name: {type: String, default(){ return ""; } },
    text: {type: String, default(){ return "Erro"; } },
})
</script>
