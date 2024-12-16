import { ref } from "vue";
import { defineStore } from "pinia";
import useAuth from "../composables/auth.js";
import router from "@/router/index.js";
import {useLoadingStore} from "@/stores/loading.js";

export const useAuthStore = defineStore("auth", () => {
    const authenticated = ref(
        JSON.parse(localStorage.getItem("authenticated")) ?? false,
    );
    const errorMessage = ref("");
    const auth = useAuth();
    const loadingStore = useLoadingStore();

    const login = async (email, password) => {
        try {
            loadingStore.loading = true;
            await auth.login(email, password);
            localStorage.setItem("authenticated", "true");
            authenticated.value = true;
            errorMessage.value = "";
            await router.push("/");
        } catch (e) {
            errorMessage.value = e.response.data.message;
            console.log(e);
        } finally {
            loadingStore.loading = false;
        }
    };

    const logout = async () => {
        try {
            loadingStore.loading = true;
            await auth.logout();
            localStorage.removeItem("authenticated");
            authenticated.value = false;
            await router.push("/");
        } catch (e) {
            console.log(e);
        } finally {
            loadingStore.loading = false;
        }
    };

    return { authenticated, login, logout, errorMessage };
});