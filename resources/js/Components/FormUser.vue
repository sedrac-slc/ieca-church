<template>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <InputText :required="true" text="Digita seu nome completo" name="fullname" icon="bx bx-user" :value="person.fullname"
            @update="person.fullname = $event"/>
        </div>
        <div>
            <InputEmail :required="true" :value="person.email" @update="person.email = $event"/>
        </div>
        <div>
            <InputText :required="true" text="Digita seu bilhete de identidade" name="number_bi" icon="bx bx-credit-card-alt" :value="person.number_bi"
            @update="person.number_bi = $event"/>
        </div>
        <div>
            <InputDate :required="true" text="Digita sua data de nascimento" name="birthday" :value="person.birthday"
            @update="person.birthday = $event"/>
        </div>
        <div>
            <Select :options="genders" text="Escolha o seu gênero" name="gender" icon="bx bx-male-female" :required="true" :value="person.gender"
            @update="person.gender = $event"/>
        </div>
        <div>
            <Select :options="maritalStatus" text="Escolha o seu estado cívil" name="marital_status" icon="bx bx-circle" :required="true" :value="person.marital_status"
            @update="person.marital_status = $event"/>
        </div>
        <div>
            <InputText :required="true" text="Digita seu nome completo do pai" name="fullname_father" icon="bx bx-male" :value="person.fullname_father"
            @update="person.fullname_father = $event"/>
        </div>
        <div>
            <InputText :required="true" text="Digita seu nome completo da mãe" name="fullname_mother" icon="bx bx-female" :value="person.fullname_mother"
            @update="person.fullname_mother = $event"/>
        </div>
        <template v-if="passwordVisible">
            <div>
                <InputPassword :required="true"  @update="person.password = $event" />
            </div>
            <div>
                <InputPassword :required="true" text="Confirma a senha" name="password_confirmation" icon="bx bxs-key"
                @update="person.password_confirmation = $event" />
            </div>
        </template>
    </div>
</template>
<script setup>

import { usePage } from '@inertiajs/vue3';

import Select from '@/Components/Select.vue';
import InputDate from '@/Components/InputDate.vue';
import InputText from '@/Components/InputText.vue';
import InputEmail from '@/Components/InputEmail.vue';
import InputPassword from '@/Components/InputPassword.vue';
import selects from '@/Parser/select';
import Person from '@/Models/Person';

defineProps({
    passwordVisible: { type: Boolean, default() { return true } },
    person: { type: Object, default(){ return Person } },
})

const page = usePage();

const genders = selects(page.props.genders, page.props.separator);
const maritalStatus = selects(page.props.maritalStatus, page.props.separator);

</script>
