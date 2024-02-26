<template>
    <NavBar :isLogin="false" :isRegister="false" />
    <section class="bg-white dark:bg-gray-900 dark:border-gray-800 border border-b-pink-500 dark:border-b-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-pink-500 text-2xl font-extrabold tracking-tight leading-none md:text-4xl dark:text-white">
                IECA: Igreja Evangélica Congregacional em Angola
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                A IECA é uma denominação cristã protestante presente em Angola e em algumas outras partes do mundo.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <Link :href="route('dashboard')" v-if="$page.props.auth.user"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 dark:focus:ring-pink-900">
                    <i class="bx bx-user-circle"></i>
                    <span>Painel de control</span>
                </Link>
                <template v-else>
                    <Link :href="route('login')"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 dark:focus:ring-pink-900">
                    <i class="bx bx-user"></i>
                    <span>Login</span>
                    </Link>
                    <Link :href="route('register')"
                        class="inline-flex justify-center items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-pink-900 rounded-lg border border-pink-300 hover:bg-pink-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <i class='bx bxs-user-detail'></i>
                        <span>Cadastramento</span>
                    </Link>
                </template>
            </div>
        </div>
    </section>
    <section
        class="dark:bg-gray-900 mx-auto px-8 py-8 dark:border-gray-800 border border-b-pink-500 dark:border-b-gray-800">
        <div class="text-pink-500 dark:text-white text-2xl">
            <i class="bx bx-info-circle bx-data"></i>
            <span>Informações</span>
        </div>
        <div class="my-8 text-justify indent-5 font-normal text-gray-500  dark:text-gray-400">
            Este website foi criado com o intuito de ajudar a nível nacional os serviços oferecidos pela IECA, onde é
            possível que todos os membros da IECA possam realizar como cadastramento como membro, pedido e entrega de carta
            de apresentação, envio de dedicatória, realizar convites entre congregações.
        </div>
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
    </section>
    <section
        class="dark:bg-gray-900 mx-auto px-8 py-8 dark:border-gray-800 border border-b-pink-500 dark:border-b-gray-800">
        <div class="grid grid-cols-1 auto-cols-max gap-5 md:grid-cols-2 md:gap-4 mx-auto">
            <div class="px-8 py-8">
                <div class="text-pink-500 dark:text-white text-2xl">
                    <i class="bx bx-phone bx-tada"></i>
                    <span>Contacto</span>
                </div>
                <div class="text-justify mt-4 indent-4 text-gray-500 dark:text-gray-400">
                    Este contactos são para ser contactos para tratar assunto com importância, por isso utliza com
                    responsabilidade.
                </div>
                <ul class="list-outside list-disc mt-4 ml-4 text-gray-500 dark:text-gray-400 space-y-2">
                    <li>
                        <span class="text-pink-500 dark:text-gray-400 mr-1">Telefone:</span>
                        <span>222355108; 923605624</span>
                    </li>
                    <li>
                        <span class="text-pink-500 dark:text-gray-400 mr-1">Fax:</span>
                        <span>2442 350868</span>
                    </li>
                    <li>
                        <span class="text-pink-500 dark:text-gray-400 mr-1">Emal:</span>
                        <span>iecageral@gmail.com, iecageral@snet.co.ao</span>
                    </li>
                </ul>
                <div
                    class="text-pink-500 dark:text-white text-2xl mt-8 md:border-t md:pt-6  md:border-t-pink-500 dark:border-t-gray-400">
                    <i class="bx bx-map bx-tada"></i>
                    <span>Localização</span>
                </div>
                <ul class="list-outside list-disc mt-4 ml-4 text-gray-500 dark:text-gray-400 space-y-2">
                    <li>Morro Bento II, Rua do Condomínio das Mangueirinhas Nº 40</li>
                    <li>Caixa Postal n.º 1552</li>
                    <li>LUANDA — ANGOLA</li>
                </ul>
            </div>
            <div class="px-8 py-8">
                <div class="text-pink-500 dark:text-white text-2xl">
                    <i class="bx bx-comment bx-tada"></i>
                    <span>Deixa sua mensagem</span>
                </div>
                <div
                    class="w-full p-4 m-4 bg-white border border-pink-500 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <form class="space-y-6" action="#">
                        <h5 class="text-xl font-medium text-gray-500 dark:text-white">Preencha os campos</h5>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <i class="bx bx-at text-pink-500 dark:text-gray-400 mr-2"></i>
                                <span>Email</span>
                            </label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-pink-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="name@company.com" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <i class="bx bx-comment-dots text-pink-500 dark:text-gray-400 mr-2"></i>
                                <span>Mensagem</span>
                            </label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-pink-300 focus:ring-pink-500 focus:border-pink-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-blue-500"
                                placeholder="Escreva aqui ..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">
                            Enviar mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="shadow bg-pink-500 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-white sm:text-center dark:text-gray-400">
                &copy; {{ (new Date()).getFullYear() }} <a href="#" class="hover:underline">IECA &trade;</a> Todos direitos
                reservados.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-white dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Home</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Sobre nós</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Acção missionário</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Publicação</a>
                </li>
            </ul>
        </div>
    </footer>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';
import NavBar from '@/Components/NavBar.vue';
</script>
