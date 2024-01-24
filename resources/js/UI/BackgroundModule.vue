<script setup lang="ts">
import { useMainStore } from '@/store/MainStore';

const mainStore = useMainStore();
</script>

<template>
    <div class="selected-module-pane__module">
        <span>BACKGROUND MODULE</span>
    </div>
    <input id="background" type="color" v-model="mainStore.background" />
</template>