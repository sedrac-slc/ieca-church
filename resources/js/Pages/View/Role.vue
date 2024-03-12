<template>
    <AuthenticatedLayout :routeActive="NavigatorLink.ROLE">
        <Table>

            <template #thead>
              <TheadTR>
                <TableTH icon="bx bx-rename" text="Nome" />
                <TableTH icon="bx bx-chat" text="Descrição" />
              </TheadTR>
            </template>

            <template #tbody>
              <TBodyTR v-for="role in roles" :key="role.id">
                <TableTD :text="role.name" />
                <TableTD :text="role.description" />
              </TBodyTR>
            </template>

          </Table>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import NavigatorLink from '@/Models/NavigatorLink';

import Table from "@/Slots/Table.vue";
import TheadTR from "@/Slots/TheadTR.vue";
import TBodyTR from "@/Slots/TBodyTR.vue";
import TableTH from "@/Components/TableTH.vue";
import TableTD from "@/Components/TableTD.vue";

defineProps(["roles"]);

</script>
