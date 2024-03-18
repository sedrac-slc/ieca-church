<template>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <InputText :required="true" text="Digita seu nome completo" name="fullname" icon="bx bx-user" :value="person.fullname"
            @update="person.fullname = $event" :disabled="disabled"/>
            <LabelError v-if="errors.fullname" :text="errors.fullname"/>
        </div>
        <div>
            <InputEmail name="email" :required="true" :value="person.email" @update="person.email = $event" :disabled="disabled"/>
            <LabelError v-if="errors.email" :text="errors.email"/>
        </div>
        <div>
            <InputText :required="true" text="Digita seu bilhete de identidade" name="identity_card" icon="bx bx-credit-card-alt" :value="person.identity_card"
            @update="person.identity_card = $event" :disabled="disabled"/>
            <LabelError v-if="errors.identity_card" :text="errors.identity_card"/>
        </div>
        <div>
            <InputDate :required="true" text="Digita sua data de nascimento" name="birthday" :value="person.birthday"
            @update="person.birthday = $event" :disabled="disabled"/>
            <LabelError v-if="errors.birthday" :text="errors.birthday"/>
        </div>
        <div>
            <Select :options="genders" text="Escolha o seu gênero" name="gender" icon="bx bx-male-female" :required="true" :value="person.gender"
            @update="person.gender = $event" :disabled="disabled"/>
            <LabelError v-if="errors.gender" :text="errors.gender"/>
        </div>
        <div>
            <Select :options="maritalStatus" text="Escolha o seu estado cívil" name="marital_status" icon="bx bx-circle" :required="true" :value="person.marital_status"
            @update="person.marital_status = $event" :disabled="disabled"/>
            <LabelError v-if="errors.marital_status" :text="errors.marital_status"/>
        </div>
        <div>
            <InputText :required="true" text="Digita seu nome completo do pai" name="fullname_father" icon="bx bx-male" :value="person.fullname_father"
            @update="person.fullname_father = $event" :disabled="disabled"/>
            <LabelError v-if="errors.fullname_father" :text="errors.fullname_father"/>
        </div>
        <div>
            <InputText :required="true" text="Digita seu nome completo da mãe" name="fullname_mother" icon="bx bx-female" :value="person.fullname_mother"
            @update="person.fullname_mother = $event"/>
            <LabelError v-if="errors.fullname_mother" :text="errors.fullname_mother"/>
        </div>
        <template v-if="passwordVisible">
            <div>
                <InputPassword :required="true"  @update="person.password = $event" :value="person.password" :disabled="disabled"/>
            </div>
            <div>
                <InputPassword :required="true" text="Confirma a senha" name="password_confirmation" icon="bx bxs-key"
                @update="person.password_confirmation = $event" :value="person.password_confirmation" :disabled="disabled"/>
            </div>
        </template>
    </div>
</template>
<script setup>

import { usePage } from '@inertiajs/vue3';

import Select from '../Inputs/Select.vue';
import InputDate from '../Inputs/InputDate.vue';
import InputText from '../Inputs/InputText.vue';
import InputEmail from '../Inputs/InputEmail.vue';
import InputPassword from '../Inputs/InputPassword.vue';
import selects from '@/Parser/select';
import Person from '@/Models/Person';
import LabelError from '../Inputs/LabelError.vue';

defineProps( {
    passwordVisible: { type: Boolean, default() { return true } },
    person: { type: Object, default(){ return Person } },
    disabled: {type: Boolean, default(){ return false; }},
    errors: {type: Object, default(){ return Person }}
})

const page = usePage();
const genders = selects(page.props.genders, page.props.separator);
const maritalStatus = selects(page.props.maritalStatus, page.props.separator);

</script>
