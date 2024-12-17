import axios from "axios";

export function useTransactions() {
    const getTransactionsData = async () => {
        try {
            const response = await axios.get("/api/V1/transactions");
            if (!response.data.data) {
                return [];
            }

           return response.data.data;
        } catch (e) {
            console.log(e);
        }
    };

    return { getTransactionsData };
}