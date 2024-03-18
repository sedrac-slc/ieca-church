<template>
  <AuthenticatedLayout :routeActive="NavigatorLink.PERMISSION">

    <ButtonCreate :modal="modalName" @click="action(Operation.CREATE,false,Permission)" />

    <Table :pagination="permissions">

      <template #thead>
        <TheadTR>
          <TableTH icon="bx bx-rename" text="Nome" />
          <TableTH icon="bx bx-chat" text="Descrição" />
          <TableTH icon="bx bx-tools" text="Acções" colspan="2" />
        </TheadTR>
      </template>

      <template #tbody>
        <TBodyTR v-for="permission in permissions.data" :key="permission.id">
          <TableTD :text="permission.name" />
          <TableTD :text="permission.description" />
          <td>
            <ButtonEdit :modal="modalName" @click="action(Operation.EDIT,false,permission)"/>
          </td>
          <td>
            <ButtonDelete :modal="modalName" @click="action(Operation.DELETE,true,permission)" />
          </td>
        </TBodyTR>
      </template>

    </Table>

    <ModalPersistence :modal="modalName" @submitted="submit()" :title="title">
        <FormPermission :permission="form" :disabled="disabled"/>
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
import Permission from "@/Models/Permission";
import FormPermission from "@/Components/Forms/FormPermission.vue";

const props = defineProps(["permissions", "errors"]);

const form = useForm(Permission);
const title = ref(Operation.CREATE)
const modalName = ref("permission-modal")
const disabled = ref(false)

const submit = () => {
    switch(title.value){
        case Operation.CREATE:
            form.post(route('permissions.store'), { });
        break;
        case Operation.EDIT:
            form.put(route('permissions.update'),{  });
        break;
        case Operation.DELETE:
            form.delete(route('permissions.delete'));
        break;
    }
};

const attribute = (form, permission) => {
    form.id = permission.id
    form.name = permission.name
    form.description = permission.description
}

const action = (operation, desactived, permission) => {
    attribute(props.errors, Permission)
    title.value = operation
    disabled.value = desactived
    attribute(form, permission)
}
</script>
