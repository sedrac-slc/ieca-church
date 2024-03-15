<template>
    <Input type="text" :name="name" :text="text" :icon="icon" :required="required" :value="value" :disabled="disabled" @update="$emit('update',$event)"/>
</template>
<script setup>
import Input from '@/Components/Input.vue';
defineEmits(['update']);
defineProps({
    value: {type: String, default(){ return ""; }},
    name: {type: String, default(){ return "name"; }},
    placeholder: {type: String, default(){ return ""; }},
    required: {type: Boolean, default(){ return false; }},
    text: {type: String, default(){ return "Digita o seu email:"; } },
    icon: {type: String, default(){ return "bx bx-at bx-tada"; }},
    disabled: {type: Boolean, default(){ return false; }},
})
</script>
