<template>
    <Input type="date" :name="name" :text="text" :icon="icon" :required="required" :disabled="disabled" :value="value" @update="$emit('update',$event)"/>
</template>
<script setup>
import Input from './Input.vue';
defineEmits(['update']);
defineProps({
    value: {type: String, default(){ return ""; }},
    name: {type: String, default(){ return "date"; }},
    placeholder: {type: String, default(){ return ""; }},
    required: {type: Boolean, default(){ return false; }},
    text: {type: String, default(){ return "Digita o seu email"; } },
    icon: {type: String, default(){ return "bx bx-calendar"; }},
    disabled: {type: Boolean, default(){ return false; }},
})
</script>
