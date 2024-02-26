<template>
    <main class="h-screen bg-white dark:bg-gray-900">
        <NavBar :isLogin="true" :isRegister="false" />
        <form @submit.prevent="submit()" class="w-full mx-auto max-w-screen-xl p-4 mt-10 space-x-1 bg-white border border-pink-500 rounded-lg shadow  md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="text-2xl font-medium text-pink-900 dark:text-white border-b border-pink-500 pb-2 mb-4">Faça o seu cadastramento</h5>
            <FormUser :person="form"/>
            <button type="submit" class="w-full mt-5 text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">
                 <span>Criar</span>
            </button>
        </form>
    </main>
</template>
<script setup>
import FormUser from '@/Components/FormUser.vue';
import NavBar from '@/Components/NavBar.vue';
import { useForm } from '@inertiajs/vue3';
import Person from '@/Models/Person';

const form = useForm(Person);

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>
