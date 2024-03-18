<template>
  <AuthenticatedLayout :routeActive="NavigatorLink.ROLE">

    <ButtonCreate :modal="modalName" @click="action(Operation.CREATE,false,Role)" />

    <Table :pagination="roles">
      <template #thead>
        <TheadTR>
          <TableTH icon="bx bx-rename" text="Nome" />
          <TableTH icon="bx bx-chat" text="Descrição" />
          <TableTH icon="bx bx-tools" text="Acções" colspan="2" />
        </TheadTR>
      </template>

      <template #tbody>
        <TBodyTR v-for="role in roles.data" :key="role.id">
          <TableTD :text="role.name" />
          <TableTD :text="role.description" />
          <td>
            <ButtonEdit :modal="modalName" @click="action(Operation.EDIT,false,role)"/>
          </td>
          <td>
            <ButtonDelete :modal="modalName" @click="action(Operation.DELETE,true,role)" />
          </td>
        </TBodyTR>
      </template>
    </Table>

    <ModalPersistence :modal="modalName" @submitted="submit()" :title="title">
        <FormRole :role="form" :disabled="disabled"/>
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
import ButtonEdit from "@/Components/Buttons/ButtonEdit.vue";
import ButtonDelete from "@/Components/Buttons/ButtonDelete.vue";
import ButtonCreate from "@/Components/Buttons/ButtonCreate.vue";
import ModalPersistence from "@/Slots/ModalPersistence.vue";
import Operation from "@/Models/Operation";
import Role from "@/Models/Role";
import FormRole from "@/Components/Forms/FormRole.vue";

const props = defineProps(["roles", "errors"]);

const form = useForm(Role);
const title = ref(Operation.CREATE)
const modalName = ref("role-modal")
const disabled = ref(false)

const submit = () => {
    switch(title.value){
        case Operation.CREATE:
            form.post(route('roles.store'), { });
        break;
        case Operation.EDIT:
            form.put(route('roles.update'),{  });
        break;
        case Operation.DELETE:
            form.delete(route('roles.delete'));
        break;
    }
};

const attribute = (form, role) => {
    form.id = role.id
    form.name = role.name
    form.description = role.description
}

const action = (operation, desactived, role) => {
    attribute(props.errors, Role)
    title.value = operation
    disabled.value = desactived
    attribute(form, role)
}

</script>
