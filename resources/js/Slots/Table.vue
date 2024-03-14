<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
    <table class="w-full text-sm text-left rtl:text-right  dark:bg-gray-800" >
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-600 dark:text-gray-400">
        <slot name="thead"/>
      </thead>
      <tbody>
        <slot name="tbody"/>
      </tbody>
    </table>
  </div>

  <nav aria-label="Page navigation example" v-if="pagination != null">
    <ul class="flex items-center -space-x-px h-8 text-sm" v-if="pagination.last_page > 1">
      <li v-if="pagination.first_page_url">
        <Link :href="pagination.first_page_url" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Previous</span>
          <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
        </Link>
      </li>
      <li v-for="i in pagination.last_page" :key="i">
        <Link :href="path(i)" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            {{ i }}
        </Link>
      </li>
      <li v-if="pagination.next_page_url">
        <Link :href="pagination.next_page_url" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Next</span>
          <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
        </Link>
      </li>
    </ul>
    </nav>

</template>
<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps({
        pagination: { type: Object, default(){ return null } },
    })
    const path = (index) => `${props.pagination.path}?page=${index}`
</script>
