<template>
    <Input type="password" :name="name" :text="text" :icon="icon" :required="required" :disabled="disabled" :value="value" @update="$emit('update',$event)"/>
</template>
<script setup>
import Input from './Input.vue';
defineEmits(['update']);
defineProps({
    value: {type: String, default(){ return ""; }},
    placeholder: {type: String, default(){ return ""; }},
    required: {type: Boolean, default(){ return false; }},
    name: {type: String, default(){ return "password"; }},
    text: {type: String, default(){ return "Digita a sua palavra passe"; } },
    icon: {type: String, default(){ return "bx bx-key bx-tada"; }},
    disabled: {type: Boolean, default(){ return false; }},
});
</script>
