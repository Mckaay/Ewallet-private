<script setup>
import {computed, ref, watch} from 'vue';
import Field from '@/components/forms/Field.vue';
import InputWithIcon from '@/components/forms/InputWithIcon.vue';
import TransactionItem from '@/components/models/transactions/TransactionItem.vue';
import TransactionListHeader from '@/components/models/transactions/TransactionListHeader.vue';
import Pagination from '@/components/pagination/Pagination.vue';
import Select from '@/components/forms/Select.vue';
import {useTransactions} from '@/composables/transactions.js';
import {useLoadingStore} from "@/stores/loading.js";
import {useCategories} from "@/composables/categories.js";

const loadingStore = useLoadingStore();

const transactionsService = useTransactions();
const categoriesService = useCategories();
await transactionsService.fetchTransactionData();
await categoriesService.fetchCategoriesData();

const options = computed(() => {
  const categoryOptions = categoriesService.categoriesList.value.map((category) => {
    return {
      value: category.id.toString(),
      label: category.name,
    }
  })

  return [
    {
      value: '0',
      label: 'All Transactions'
    },
      ...categoryOptions
  ]
});

const sortOptions = [
  {value: 'latest', label: 'Latest'},
  {value: 'oldest', label: 'Oldest'},
  {value: 'atoz', label: 'A to Z'},
  {value: 'ztoa', label: 'Z to A'},
  {value: 'highest', label: 'Highest'},
  {value: 'lowest', label: 'Lowest'}
];

const currentPage = ref(1);
const searchQuery = ref('');
const categorySelected = ref();
const sortSelected = ref();

watch([searchQuery, currentPage, categorySelected, sortSelected], async () => {
  if (loadingStore.loading) return;
  await transactionsService.fetchTransactionData(currentPage.value, searchQuery.value, categorySelected.value, sortSelected.value);
});


</script>

<template>
  <section class="transactions-list-wrapper">
    <div class="filter-section">
      <Field id="search">
        <InputWithIcon
            v-model="searchQuery"
            type="text"
            placeholder="Search transaction"
        />
      </Field>
      <div class="filter-wrapper">
        <Select class="sort"
                v-model="sortSelected"
                label="Sort By"
                :options="sortOptions"
        />
        <Select
            class="category-sort"
            v-model="categorySelected"
            label="Category"
            :options="options"
        />
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
    <Pagination
        :currentPage="currentPage"
        :lastPage="transactionsService.paginationMeta.value.last_page"
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

.transactions-list-wrapper .filter-section {
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
  overflow-x: auto;
}
</style>