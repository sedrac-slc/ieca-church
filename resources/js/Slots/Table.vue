<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right  dark:bg-gray-800" >
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-600 dark:text-gray-400">
        <slot name="thead"/>
      </thead>
      <tbody>
        <slot name="tbody"/>
      </tbody>
    </table>
  </div>
</template>
