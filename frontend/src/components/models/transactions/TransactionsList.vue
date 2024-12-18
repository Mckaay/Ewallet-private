<script setup>
import {ref, watch} from 'vue';
import SortIcon from '@/components/icons/SortIcon.vue';
import FilterIcon from '@/components/icons/FilterIcon.vue';
import Field from '@/components/forms/Field.vue';
import InputWithIcon from '@/components/forms/InputWithIcon.vue';
import TransactionItem from '@/components/models/transactions/TransactionItem.vue';
import TransactionListHeader from '@/components/models/transactions/TransactionListHeader.vue';

import {useTransactions} from '@/composables/transactions.js';
import {useLoadingStore} from "@/stores/loading.js";
import Pagination from "@/components/pagination/Pagination.vue";

const loadingStore = useLoadingStore();

const searchQuery = ref('');
const currentPage = ref(1);

const transactionsService = useTransactions();
await transactionsService.fetchTransactionData();

watch(currentPage, async () => {
  if (loadingStore.loading) {
    return;
  }

  await transactionsService.fetchTransactionData(currentPage.value);
})
</script>

<template>
  <section class="transactions-list-wrapper">
    <div class="header-wrapper">
      <Field id="search">
        <InputWithIcon
            v-model="searchQuery"
            type="text"
            placeholder="Search transaction"
        />
      </Field>
      <div class="filter-wrapper">
        <SortIcon style="min-width: 16px;"/>
        <FilterIcon style="min-width: 16px;"/>
      </div>
    </div>
    <TransactionListHeader/>
    <ul class="transactions-list">
      <TransactionItem
          v-for="transaction in transactionsService.transactionList.value"
          :key="transaction.id"
          :transaction="transaction"
      />
    </ul>
    <Pagination :currentPage="currentPage" :lastPage="transactionsService.paginationMeta.value.last_page"
        @update:currentPage="page => currentPage = page"
    />
  </section>
</template>

<style scoped>
.transactions-list-wrapper {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-150);
  padding: var(--spacing-150) var(--spacing-125);
  background-color: var(--clr-white);
  border-radius: var(--spacing-75);

  @media screen and (min-width: 768px) {
    padding: var(--spacing-200) var(--spacing-200);
  }
}

.transactions-list-wrapper .header-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: var(--spacing-150);
}

.transactions-list-wrapper .filter-wrapper {
  display: flex;
  align-items: center;
  gap: var(--spacing-150);
}

.transactions-list-wrapper .transactions-list {
  list-style: none;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: var(--spacing-100);
}
</style>