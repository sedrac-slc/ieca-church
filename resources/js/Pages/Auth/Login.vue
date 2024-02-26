<template>
    <main class="h-screen bg-white dark:bg-gray-900">
        <NavBar :isLogin="false" :isRegister="true" />
        <div
            class="w-full mx-auto max-w-screen-md p-4 mt-14 bg-white border border-pink-500 rounded-lg shadow  md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" @submit.prevent="submit()">
                <h5 class="text-2xl font-medium text-pink-900 dark:text-white border-b border-pink-500 pb-4">Faça a autenticação</h5>
                <div>
                    <InputEmail @update="form.email = $event" :required="true"/>
                </div>
                <div>
                    <InputPassword @update="form.password = $event" :required="true"/>
                </div>
                <div class="flex items-start">
                    <Checkbox text="Lembrança de mi"  v-model="form.remember" :required="true" name="remember" :checked="form.remember"/>
                    <a href="#" class="ms-auto text-sm text-pink-700 hover:underline dark:text-pink-500">Esqueci a senha?</a>
                </div>
                <button type="submit" class="w-full text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">
                    <span>Fazer Login</span>
                </button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Não tenho uma conta? <a href="#" class="text-pink-700 hover:underline dark:text-pink-500">Criar uma conta</a>
                </div>
            </form>
        </div>
    </main>
</template>
<script setup>

import { useForm } from '@inertiajs/vue3';

import NavBar from '@/Components/NavBar.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputEmail from '@/Components/InputEmail.vue';
import InputPassword from '@/Components/InputPassword.vue';

const form = useForm({
    email: '',
    password: '',
    remember: true,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

</script>
