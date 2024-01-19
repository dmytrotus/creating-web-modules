<script setup lang="ts">
defineProps({
    selectedModule: String | null,
})


</script>

<template>
    <div v-if="selectedModule" class="selected-module-pane__module">
        <span>{{ selectedModule }}</span>
    </div>
</template>