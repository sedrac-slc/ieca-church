<template>
  <AuthenticatedLayout :routeActive="NavigatorLink.BAPTISM">

    <ButtonCreate :modal="modalName" @click="action(Operation.CREATE,true,false,BaptismUser);"/>

    <Table :pagination="baptisms">
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
        <TBodyTR v-for="baptism in baptisms.data" :key="baptism.id">
          <TableTD :text="baptism.baptism_congregation" />
          <TableTD :text="baptism.baptism_local" />
          <TableTD :text="baptism.baptism_date" />
          <TableTD :text="baptism.confirm_congregation" />
          <TableTD :text="baptism.confirm_local" />
          <TableTD :text="baptism.confirm_date" />
          <TableTD :text="baptism.received_congregation" />
          <TableTD :text="baptism.received_date" />
          <TableTD :text="baptism.received_congregation" />
          <TableTD :text="baptism.received_date" />
          <td>
            <ButtonEdit :modal="modalName" @click="action(Operation.EDIT,false,false,baptism)" />
          </td>
          <td>
            <ButtonDelete :modal="modalName" @click="action(Operation.DELETE,false,true,baptism)"/>
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

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavigatorLink from "@/Models/NavigatorLink";
import Table from "@/Slots/Table.vue";
import TheadTR from "@/Slots/TheadTR.vue";
import TBodyTR from "@/Slots/TBodyTR.vue";
import TableTH from "@/Components/TableTH.vue";
import TableTD from "@/Components/TableTD.vue";
import ButtonEdit from '@/Components/Buttons/ButtonEdit.vue';
import ButtonDelete from '@/Components/Buttons/ButtonDelete.vue';
import ButtonCreate from '@/Components/Buttons/ButtonCreate.vue';
import ModalPersistence from "@/Slots/ModalPersistence.vue";
import FormUser from "@/Components/Forms/FormUser.vue";
import Operation from '@/Models/Operation';
import BaptismUser from '@/Models/BaptismUser';

const props = defineProps(["baptisms", "errors"]);

const form = useForm(BaptismUser);
const title = ref(Operation.CREATE)
const disabled = ref(false)
const passwordVisible = ref(true)
const modalName = ref("baptism-modal")

const attribute = (form, baptism) => {
    form.id = baptism.id
    form.baptism_id = baptism.baptism_id
    form.baptism_congregation = baptism.baptism_congregation
    form.baptism_local = baptism.baptism_local
    form.baptism_date = baptism.baptism_date
    form.confirm_congregation = baptism.confirm_congregation
    form.confirm_local = baptism.confirm_local
    form.confirm_date = baptism.confirm_date
    form.received_congregation = baptism.received_congregation
    form.received_local = baptism.received_local
    form.received_date = baptism.received_date
    form.isseud_on = baptism.isseud_on
}

const action = (operation, visible, desactive, baptism) => {
    attribute(props.errors, BaptismUser);

    title.value= operation;
    passwordVisible.value = visible;
    disabled.value = desactive;

    attribute(form, baptism);
}

const submit = () => {

    switch(title.value){
        case Operation.CREATE:
            form.post(route('baptism.store'), {

            });
        break;
        case Operation.EDIT:
           form.put(route('baptism.update'),{  });
        break;
        case Operation.DELETE:
            form.delete(route('baptism.delete'));
        break;
    }
};

</script>
