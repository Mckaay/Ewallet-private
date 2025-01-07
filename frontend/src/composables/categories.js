import axios from 'axios';
import { ref } from 'vue';
import { useLoadingStore } from '@/stores/loading.js';

export function useCategories() {
    const categoriesList = ref([]);
    const availableCategoriesForBudget = ref([]);
    const loadingStore = useLoadingStore();

    const fetchCategoriesData = async () => {
        try {
            loadingStore.loading = true;

            const response = await axios.get('api/V1/categories');
            if (!response.data?.data) {
                categoriesList.value = [];
                return;
            }

            categoriesList.value = response.data.data
        } catch (error) {
            console.error('Error fetching categories data:', error);
        } finally {
            loadingStore.loading = false;
        }
    };

    const fetchAvailableCategoriesForBudget = async () => {
        try {
            loadingStore.loading = true;
            const response = await axios.get('api/V1/budgets/categories');
            if (!response.data?.data) {
                availableCategoriesForBudget.value = [];
                return;
            }

            availableCategoriesForBudget.value = response.data.data
        } catch (error) {
            console.error('Error fetching categories data:', error);
        } finally {
            loadingStore.loading = false;
        }
    }

    return {
        categoriesList,
        fetchCategoriesData,
        availableCategoriesForBudget,
        fetchAvailableCategoriesForBudget,
    };
}
