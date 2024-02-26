<template>
    <td class="px-6 py-3 dark:text-white">
        <span>{{ text }}</span>
    </td>
</template>
<script setup>
defineProps({
    text: {type: String, default(){ return "";} },
})
</script>
