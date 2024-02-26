<template>
    <div class="flex items-center me-4">
        <input :checked="checked" :id="name" type="checkbox" :value="value" v-model="checkModal"
            class="w-4 h-4 text-pink-600 bg-gray-100 border-pink-300 rounded focus:ring-pink-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label :for="name" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ text }}</label>
    </div>
</template>
<script setup>
defineProps({
    name: {type: String, required: true},
    text: {type: String, required: true},
    value: {type: String, default(){ return ""; }},
    placeholder: {type: String, default(){ return ""; }},
    checked: {type: Boolean, default(){ return false; }},
    required: {type: Boolean, default(){ return false; }},
});
const checkModal = defineModel();
</script>
