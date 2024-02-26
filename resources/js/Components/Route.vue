<template>
    <Link :href="route(link)" :class="{
        'flex text-lg items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group': true,
        'active': active
    }">
        <i :class="icon+' text-pink-500'"></i>
        <span class="ms-3 whitespace-nowrap">{{ text }}</span>
    </Link>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    icon: {type: String, default(){ return "bx bx-link"; }},
    text: {type: String, require: true},
    link: {type: String, default(){ return "home"; }},
    active: {type: Boolean, require: false},
});
</script>
