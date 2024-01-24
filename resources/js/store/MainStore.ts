import { defineStore } from 'pinia';
import { ref } from 'vue'

export const useMainStore = defineStore('mainStore', () => {
    const selected_module = ref<string | null>(null)
    const clickout = ref<string>('')
    const width = ref<number>(50)
    const height = ref<number>(50)
    const position_x = ref<number>(50)
    const position_y = ref<number>(50)
    const background = ref<string>('#FF9B00')
    function changeSelectedModule (value: string | null) {
        selected_module.value = value;
    }
  
    return { 
        selected_module,
        clickout,
        width,
        height,
        position_x,
        position_y,
        background,
        changeSelectedModule
    }
})