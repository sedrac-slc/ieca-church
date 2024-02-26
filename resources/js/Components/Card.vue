<template>


<div class="p-6 bg-pink-500 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-white">
           <i :class="icon"></i>
           <span>{{ title }}</span>
        </h5>
    </a>
    <p class="mb-3 font-normal text-white">
        {{ text }}
    </p>
</div>
</template>
<script setup>
    defineProps({
        icon: '',
        title: '',
        text: '',
    })
</script>
