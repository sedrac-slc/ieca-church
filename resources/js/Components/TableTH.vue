<template>
    <th scope="col" :colspan="colspan" class="px-6 py-3 text-sm dark:text-white">
        <i :class="icon+' text-pink-500'"></i>
        <span>{{ text }}</span>
    </th>
</template>
<script setup>
defineProps({
    icon: {type: String, default(){ return "";} },
    text: {type: String, default(){ return "";} },
    colspan: {type: String, default(){ return "1";} },
})
</script>
