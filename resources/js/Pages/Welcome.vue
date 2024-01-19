<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();
</script>

<template>
    <Head title="Welcome" />

    <nav class="nav">
      <img src="images/logo.svg" alt="logo" />
      <button class="button">GENERATE FILES</button>
    </nav>
    <main class="main">
      <section class="pane available-modules-pane">
        <h3>AVAILABLE MODULES</h3>
        <button class="available-modules-pane__button button">
          BACKGROUND
        </button>
        <button class="available-modules-pane__button button">
          TYPO
        </button>
      </section>
      <section class="pane selected-module-pane">
        <h3>SELECTED MODULE</h3>
        <div class="selected-module-pane__module">
          <span>BACKGROUND</span>
        </div>
      </section>
      <section class="pane module-settings-pane">
        <h3>MODULE SETTINGS</h3>
        <div class="form-group">
          <label for="clickout">Clickout</label>
          <div>
            <input
              id="clickout"
              type="text"
              name="clickout"
              placeholder="https://appverk.com"
              value="https://appverk.com"
            />
          </div>
        </div>
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
