import axios from 'axios';
import { ref } from 'vue';
import { useLoadingStore } from '@/stores/loading.js';

export function useTransactions() {
    const transactionList = ref([]);
    const paginationMeta = ref({});
    const loadingStore = useLoadingStore();

    const fetchTransactionData = async (
        page = 1,
        searchQuery = '',
        category = 0,
        sort = 'latest'
    ) => {
        try {
            loadingStore.loading = true;
            const response = await axios.get(`/api/V1/transactions?page=${page}&search=${searchQuery}&category=${category}&sort=${sort}`);
            if (!response.data?.data) {
                transactionList.value = [];
                paginationMeta.value = {};
                return;
            }

            transactionList.value = response.data.data;
            paginationMeta.value = response.data.meta;
        } catch (error) {
            console.error('Error fetching transactions data:', error);
        } finally {
            loadingStore.loading = false;
        }
    };

    return {
        transactionList,
        paginationMeta,
        fetchTransactionData,
    };
}
