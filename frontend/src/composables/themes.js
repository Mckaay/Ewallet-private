import axios from 'axios';
import {ref} from 'vue';
import {useLoadingStore} from '@/stores/loading.js';

export function useThemes() {
    const availableThemesForBudget = ref([]);
    const loadingStore = useLoadingStore();
    const fetchAvailableThemesForBudget = async () => {
        try {
            loadingStore.loading = true;
            const response = await axios.get('api/V1/budgets/themes');
            if (!response.data?.data) {
                availableThemesForBudget.value = [];
                return;
            }
            availableThemesForBudget.value = response.data.data;
        } catch (error) {
            console.log(error);
        } finally {
            loadingStore.loading = false;
        }
    }

    return {
        availableThemesForBudget,
        fetchAvailableThemesForBudget,
    }
}