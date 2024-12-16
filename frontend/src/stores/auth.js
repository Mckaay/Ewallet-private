import {defineStore} from "pinia";
import {ref} from "vue";

export const useAuthStore = defineStore('auth', () => {
    const authenticated = ref(true);

    return { authenticated }
})