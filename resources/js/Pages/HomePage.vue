<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

interface Module {
    id: number;
    url: string;
    selected_module: string;
}

defineProps<{
    modules: {
        data: Module[]
    };
}>();
</script>

<template>
    <Head title="Welcome" />

    <nav class="nav">
      <img src="images/logo.svg" alt="logo" />

    </nav>
    <main class="main">
      <section class="pane available-modules-pane">
        On the right, you can see a list of modules.<br/>
        When you click on each of them, the download will start.
        <a class="link" href="/welcome">To the app</a>
      </section>
      <section class="pane selected-module-pane">
        <div v-for="(module, index) in modules.data">
            <a class="module-link" :href="module.url">
                {{ module.id }}. {{ module.selected_module }}
            </a>
        </div>
      </section>
      <section class="pane module-settings-pane">

      </section>
    </main>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
