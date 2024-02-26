<template>
    <AuthenticatedLayout :routeActive="NavigatorLink.DASHBORAD">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block border-b-1 p-4 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Apresentação</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-1 rounded-t-lg hover:text-pink-600 hover:border-gray-300"
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                        aria-selected="false">Dados pessoas</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-1  rounded-t-lg hover:text-pink-600 hover:border-gray-300"
                        id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                        aria-selected="false">Palavra Passe</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <div class="grid grid-cols-1 auto-cols-max gap-5 md:grid-cols-4 md:gap-4 mx-auto mb-3">
                    <Card icon="bx bx-user bx-tada" title="Registro"
                        text="Os membro podem fazer o seu registro ou pedido para ser aceito como membro é plena comunhão" />
                    <Card icon="bx bx-envelope bx-tada" title="Carta de apresentação"
                        text="Os membro podem fazer o pedido das suas carta de apresentação apartir deste website" />
                    <Card icon="bx bx-conversation bx-tada" title="Dedicatória"
                        text="Os membro podem fazer entrega as sua dedicatórias para igreja apartir deste website, seja qualquer tipo de dedicatória" />
                    <Card icon="bx bx-mail-send bx-tada" title="Convites entre congregações"
                        text="Para todas as igejas da IECA registrada neste site, podem realizar pedidos ou trocas de informações como convites" />
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <FormUser :passwordVisible="false" :person="$page.props.auth.user"/>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                aria-labelledby="settings-tab">

            </div>
        </div>

    </AuthenticatedLayout>
</template>
<script setup>
import Card from '@/Components/Card.vue';
import FormUser from '@/Components/FormUser.vue';
import NavigatorLink from '@/Models/NavigatorLink';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>
