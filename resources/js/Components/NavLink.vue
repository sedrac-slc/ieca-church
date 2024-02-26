<template>
    <li>
        <Link :href="route(href)" :class="classes">
           <i :class="icon"></i>
           <span>{{ text }}</span>
        </Link>
    </li>
</template>
<script setup>
    import { computed } from 'vue';
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        href: {type: String, required: true},
        active: {type: Boolean},
        text: {type: String},
        icon: {type: String}
    })

    const classes = computed(() => props.active
        ? 'block py-2 px-3 md:p-0 text-pink-500 dark:text-white'
        : 'block py-2 px-3 md:p-0 text-pink-500 dark:text-white'
    )

</script>
