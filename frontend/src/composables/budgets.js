import axios from 'axios';
import {ref} from 'vue';
import {useLoadingStore} from '@/stores/loading.js';

export function useBudgets() {
    const budgetList = ref([]);
    const loadingStore = useLoadingStore();

    const fetchBudgetsData = async () => {
        try {
            loadingStore.loading = true;
            const response = await axios.get('api/V1/budgets');

            if (!response.data?.data) {
                budgetList.value = [];
                return;
            }

            budgetList.value = response.data.data;
        } catch (error) {
            console.log(error);
        } finally {
            loadingStore.loading = false;
        }
    }

    const saveBudget = async (data) => {
        try {
            loadingStore.loading = true;
            const response = await axios.post('api/V1/budgets', data);
        } catch (error) {
            console.log(error);
        } finally {
            loadingStore.loading = false;
        }
    }

    return {
        budgetList,
        fetchBudgetsData,
        saveBudget,
    }
}