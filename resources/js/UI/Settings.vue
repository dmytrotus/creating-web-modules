<script setup lang="ts">
import { useMainStore } from '@/store/MainStore';

const mainStore = useMainStore();
</script>

<template>
    <div class="form-group">
        <label for="clickout">Clickout</label>
        <div>
        <input
            id="clickout"
            type="text"
            name="clickout"
            placeholder="https://appverk.com"
            v-model="mainStore.clickout"
        />
        </div>
    </div>
    <div class="flex">
        <div class="form-group">
            <label>Width (%)</label>
            <div>
            <input
                type="number"
                name="width"
                v-model="mainStore.width"
            />
            </div>
        </div>
        <div class="form-group">
            <label>Height (%)</label>
            <div>
            <input
                type="number"
                name="height"
                v-model="mainStore.height"
            />
            </div>
        </div>
    </div>

    <div class="flex">
        <div class="form-group">
            <label>Position X (%)</label>
            <div>
            <input
                type="number"
                name="position_x"
                v-model="mainStore.position_x"
            />
            </div>
        </div>
        <div class="form-group">
            <label>Position Y (%)</label>
            <div>
            <input
                type="number"
                name="position_y"
                v-model="mainStore.position_y"
            />
            </div>
        </div>
    </div>
    
</template>