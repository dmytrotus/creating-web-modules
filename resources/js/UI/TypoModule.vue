<script setup lang="ts">
defineProps({
    selectedModule: String as () => String | null,
})


</script>

<template>
    <div v-if="selectedModule" class="selected-module-pane__module">
        <span>{{ selectedModule }}</span>
    </div>
    <input id="text" type="text" value="Some text" />
</template>