<template>
  <AuthenticatedLayout :routeActive="NavigatorLink.USER">

    <ButtonCreate :modal="modalName" @click="action(Operation.CREATE,true,false,Person);"/>

    <Table :pagination="users">
      <template #thead>
        <TheadTR>
          <TableTH icon="bx bx-rename" text="Nome" />
          <TableTH icon="bx bx-rename" text="Pai" />
          <TableTH icon="bx bx-rename" text="Mãe" />
          <TableTH icon="bx bx-chat" text="Bilhete" />
          <TableTH icon="bx bx-chat" text="Email" />
          <TableTH icon="bx bx-chat" text="Data nascimento" />
          <TableTH icon="bx bx-chat" text="Gênero" />
          <TableTH icon="bx bx-chat" text="Estado Cívil" />
          <TableTH icon="bx bx-tools" text="Acções" colspan="2"/>
        </TheadTR>
      </template>

      <template #tbody>
        <TBodyTR v-for="user in users.data" :key="user.id">
          <TableTD :text="user.fullname" />
          <TableTD :text="user.fullname_father" />
          <TableTD :text="user.fullname_mother" />
          <TableTD :text="user.identity_card" />
          <TableTD :text="user.email" />
          <TableTD :text="user.birthday" />
          <TableTD :text="user.gender" />
          <TableTD :text="user.marital_status" />
          <td>
            <ButtonEdit :modal="modalName" @click="action(Operation.EDIT,false,false,user)" />
          </td>
          <td>
            <ButtonDelete :modal="modalName" @click="action(Operation.DELETE,false,true,user)"/>
          </td>
        </TBodyTR>
      </template>
    </Table>

    <ModalPersistence :modal="modalName" @submitted="submit()" :title="title">
        <FormUser :person="form" :passwordVisible="passwordVisible" :disabled="disabled" :errors="errors"/>
    </ModalPersistence>

  </AuthenticatedLayout>
</template>
<script setup>

import { ref } from "vue";
import { useForm } from '@inertiajs/vue3';
import { Modal } from 'flowbite';

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavigatorLink from "@/Models/NavigatorLink";
import Table from "@/Slots/Table.vue";
import TheadTR from "@/Slots/TheadTR.vue";
import TBodyTR from "@/Slots/TBodyTR.vue";
import TableTH from "@/Components/TableTH.vue";
import TableTD from "@/Components/TableTD.vue";
import FormUser from "@/Components/FormUser.vue";
import ButtonEdit from "@/Components/ButtonEdit.vue";
import ButtonDelete from "@/Components/ButtonDelete.vue";
import ButtonCreate from "@/Components/ButtonCreate.vue";
import ModalPersistence from "@/Slots/ModalPersistence.vue";
import Operation from '@/Models/Operation';
import Person from '@/Models/Person';

const props = defineProps(["users", "errors"]);

const form = useForm(Person);
const title = ref(Operation.CREATE)
const disabled = ref(false)
const passwordVisible = ref(true)
const modalName = ref("user-modal")
const modalEl = document.getElementById(`${modalName.value}`)
//const modal = new Modal(modalEl);

const attribute = (form, user) => {
    form.id = user.id
    form.fullname = user.fullname
    form.fullname_father = user.fullname_father
    form.fullname_mother = user.fullname_mother
    form.birthday = user.birthday
    form.identity_card = user.identity_card
    form.email = user.email
    form.gender = user.gender
    form.marital_status = user.marital_status
}

const action = (operation, visible, desactive, user) => {
    attribute(props.errors, Person);

    title.value= operation;
    passwordVisible.value = visible;
    disabled.value = desactive;

    attribute(form, user);
}

const submit = () => {

    switch(title.value){
        case Operation.CREATE:
            form.post(route('users.store'), {
                onFinish: () => form.reset('password', 'password_confirmation'),
            });
        break;
        case Operation.EDIT:
           form.put(route('users.update'),{  });
        break;
        case Operation.DELETE:
            form.delete(route('users.delete', { user: form.id}));
        break;
    }
};

</script>
