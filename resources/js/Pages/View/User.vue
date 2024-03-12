<template>
    <AuthenticatedLayout :routeActive="NavigatorLink.USER">
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import NavigatorLink from '@/Models/NavigatorLink';
</script>
