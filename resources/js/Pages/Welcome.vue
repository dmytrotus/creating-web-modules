<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import BackgroundModule from '@/UI/BackgroundModule.vue';
import TypoModule from '@/UI/TypoModule.vue';
import Settings from '@/UI/Settings.vue';
import axios from 'axios';
import { useMainStore } from '@/store/MainStore';

const mainStore = useMainStore();

const chooseModule = (moduleName: string | null = null): void => {
    mainStore.changeSelectedModule(moduleName)
}

const generateFiles = async () => {
  try {
    const response = await axios.post(route('generate.files'), {
      selected_module: mainStore.selected_module,
      clickout: mainStore.clickout,
      width: mainStore.width,
      height: mainStore.height,
      position_x: mainStore.position_x,
      position_y: mainStore.position_y,
      background: mainStore.background
    })
    if (response.data) {
      window.open(response.data);
    }
  } 
  catch (err) {
    if (axios.isAxiosError(err) && err.response) {
      alert(err.response.data.message);
    } else {
      console.error(err);
    }
  }
}

</script>

<template>
    <Head title="Welcome" />

    <nav class="nav">
      <img src="images/logo.svg" alt="logo" />
      <button @click="generateFiles" class="button">GENERATE FILES</button>
    </nav>
    <main class="main">
      <section class="pane available-modules-pane">
        <h3>AVAILABLE MODULES</h3>
        <button @click="chooseModule('background')" class="available-modules-pane__button button">
          BACKGROUND
        </button>
        <button @click="chooseModule('typo')" class="available-modules-pane__button button">
          TYPO
        </button>
        <button @click="chooseModule()" class="available-modules-pane__button button">
          Clear selection
        </button>
      </section>
      <section class="pane selected-module-pane">
        <h3>SELECTED MODULE</h3>

        <BackgroundModule
          v-if="mainStore.selected_module === 'background'"
         />
         <TypoModule
          v-if="mainStore.selected_module === 'typo'"
         />
  
      </section>
      <section class="pane module-settings-pane">
        <h3>MODULE SETTINGS</h3>
        <Settings
        v-if="mainStore.selected_module" />
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
