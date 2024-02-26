<template>
    <div @click="toggleDark()" class="cursor-pointer">
        <i class='bx bxs-sun bx-sm bx-tada-hover text-pink-500 dark:text-white' v-if="isDark"></i>
        <i class='bx bxs-moon bx-sm bx-tada-hover text-pink-500 dark:text-white' v-else></i>
    </div>

    <div @click="toggle()" class="cursor-pointer">
        <i class='bx bx-exit-fullscreen bx-sm bx-tada-hover text-pink-500 dark:text-white' v-if="isFullscreen"></i>
        <i class='bx bx-fullscreen bx-sm bx-tada-hover text-pink-500 dark:text-white' v-else></i>
    </div>
</template>
<script setup>

import { useDark, useToggle } from "@vueuse/core";
import { useFullscreen } from '@vueuse/core';

const isDark = useDark();
const toggleDark = useToggle(isDark);
const { isFullscreen, toggle } = useFullscreen();
</script>
