<template>
    <label :for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        <i :class="icon+' text-pink-500'"></i>
        <span>{{ text }}</span>
        <span v-if="required" class="text-pink-600">*</span>
    </label>
    <input :type="type" :name="name" :id="name" :placeholder="placeholder" :required="required" :value="value" @input="$emit('update', $event.target.value)" :disabled="disabled"
        class="bg-gray-50 border border-pink-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
</template>
<script setup>
defineEmits(['update']);
defineProps({
    name: {type: String, required: true},
    icon: {type: String, required: true},
    text: {type: String, required: true},
    value: {type: String, default(){ return ""; }},
    type: {type: String, default(){ return "text"; }},
    placeholder: {type: String, default(){ return ""; }},
    required: {type: Boolean, default(){ return false; }},
    disabled: {type: Boolean, default(){ return false; }},
});
</script>
