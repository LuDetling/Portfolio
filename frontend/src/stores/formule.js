import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useFormuleStore = defineStore('formule', () => {
    const formule = ref('')
    return { formule }
})
