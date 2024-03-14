<template>
  <AuthenticatedLayout :routeActive="NavigatorLink.USER">

    <ButtonCreate :modal="modal" />

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
        </TBodyTR>
      </template>
    </Table>

    <ModalPersistence :modal="modal" @submitted="submit()">
        <FormUser :person="form" />
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
import ButtonCreate from "@/Components/ButtonCreate.vue";
import ModalPersistence from "@/Slots/ModalPersistence.vue";
import {UserTest} from '@/Models/Person';

const form = useForm(UserTest);
defineProps(["users"]);

const modal = ref("user-modal")

const submit = () => {
    form.post(route('users.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>
