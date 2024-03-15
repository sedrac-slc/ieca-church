<template>
  <AuthenticatedLayout :routeActive="NavigatorLink.USER">

    <ButtonCreate :modal="modal" @click="title=Operation.CREATE; passwordVisible = true;  disabled = false; form = Person;"/>

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
          <TableTD :text="user.number_bi" />
          <TableTD :text="user.email" />
          <TableTD :text="user.birthday" />
          <TableTD :text="user.gender" />
          <TableTD :text="user.marital_status" />
          <td>
            <ButtonEdit :modal="modal" @click="title=Operation.EDIT; passwordVisible = false; disabled = false; form = user;" />
          </td>
          <td>
            <ButtonDelete :modal="modal" @click="title=Operation.DELETE; passwordVisible = false; disabled = true; form = user;"/>
          </td>
        </TBodyTR>
      </template>
    </Table>

    <ModalPersistence :modal="modal" @submitted="submit()" :title="title">
        <FormUser :person="form" :passwordVisible="passwordVisible" :disabled="disabled"/>
    </ModalPersistence>

  </AuthenticatedLayout>
</template>
<script setup>

import { ref } from "vue";
import { useForm } from '@inertiajs/vue3';

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

defineProps(["users"]);

const form = useForm(Person);
const title = ref(Operation.CREATE)
const disabled = ref(false)
const passwordVisible = ref(true)
const modal = ref("user-modal")

const submit = () => {
    switch(title.value){
        case Operation.CREATE:
            form.post(route('users.store'), {
                onFinish: () => form.reset('password', 'password_confirmation'),
            });
        break;
        case Operation.EDIT:
            form.put(route('users.update', form.id), {
                onFinish: () => form.reset('password', 'password_confirmation'),
            });
        break;
        case Operation.DELETE:
            form.delete(route('users.delete', form.id), {
                onFinish: () => form.reset('password', 'password_confirmation'),
            });
        break;
    }
};

</script>
