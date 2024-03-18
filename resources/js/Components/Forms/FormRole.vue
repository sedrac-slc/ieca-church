<template>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
        <div>
            <InputText :required="true" text="Digita o código" name="name" icon="bx bx-user" :value="role.name"
            @update="role.name = $event" :disabled="disabled"/>
            <LabelError v-if="errors.name" :text="errors.name"/>
        </div>
        <div>
            <Textarea :required="true" text="Digita a descrição" name="description" icon="bx bx-comment" :value="role.description"
            @update="role.description = $event" :disabled="disabled"/>
            <LabelError v-if="errors.description" :text="errors.description"/>
        </div>
    </div>
</template>
<script setup>

import InputText from '../Inputs/InputText.vue';
import LabelError from '../Inputs/LabelError.vue';
import Role from '@/Models/Role';
import Textarea from '../Inputs/Textarea.vue';

defineProps( {
    role: { type: Object, default(){ return Role } },
    disabled: {type: Boolean, default(){ return false; }},
    errors: {type: Object, default(){ return Role }}
})

</script>
