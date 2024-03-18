<template>
    <label :for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        <i class="bx bx-comment text-pink-600" v-if="icon"></i>
        <span>{{ text }}</span>
        <span v-if="required" class="text-pink-600">*</span>
    </label>
    <textarea :id="name" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-pink-300 focus:ring-pink-500 focus:border-pink-500 dark:bg-pink-700 dark:border-pink-600 dark:placeholder-pink-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500" :placeholder="placeholder"
    :disabled="disabled" :required="required" @input="$emit('update', $event.target.value)" :value="value"></textarea>
</template>
<script setup>
defineEmits(['update']);
defineProps({
    name: {type: String, required: true},
    icon: {type: String, required: true},
    text: {type: String, required: true},
    value: {type: String, default(){ return ""; }},
    placeholder: {type: String, default(){ return ""; }},
    required: {type: Boolean, default(){ return false; }},
    disabled: {type: Boolean, default(){ return false; }},
})
</script>
