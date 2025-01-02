<script setup>
import Menu from "@/components/menu/Menu.vue";
import ModelHeader from "@/components/models/ModelHeader.vue";
import TransactionsList from "@/components/models/transactions/TransactionsList.vue";
import Loader from "@/components/buttons/Loader.vue";
import Button from "@/components/buttons/Button.vue";
import Field from "@/components/forms/Field.vue";
import Input from "@/components/forms/Input.vue";
import Modal from "@/components/modals/Modal.vue";
import Select from "@/components/forms/Select.vue";
import {computed, onBeforeMount, onMounted, reactive, ref} from "vue";
import {useCategories} from "@/composables/categories.js";
import {useTransactions} from "@/composables/transactions.js";


const modal = ref(null);

const openModal = () => {
  modal.value.openModal();
}

const categoriesService = useCategories();
const transactionService = useTransactions();

onMounted(async () => {
  await categoriesService.fetchCategoriesData();
})

const options = computed(() => {
  const categoryOptions = Object.entries(categoriesService.categoriesList.value).map(([key, value]) => ({
    value: key,
    label: value
  }));

  return [
    ...categoryOptions
  ];
});

const addTransactionForm = reactive( {
  'name': '',
  'date': '',
  'category_id': '',
  'amount': '',
});

const saveTransaction = async () => {
  await transactionService.saveTransaction({...addTransactionForm})
}
</script>

<template>
  <Menu/>
  <main>
    <header class="model-header">
      <h1>Transactions</h1>
      <Button @click="openModal" class="button-primary" text="+ Add New Transaction"/>
    </header>
    <Modal
        ref="modal"
        modalHeader="Add New Transaction"
        modalDescription="Create transactions to manage, control your spendings and incomes."
    >
      <form @submit.prevent="saveTransaction">
        <Field id="name" label="Name">
          <Input
              v-model="addTransactionForm.name"
              type="text"
              placeholder="Name of transaction"
          />
        </Field>
        <Field id="date" label="Date">
          <Input
              v-model="addTransactionForm.date"
              type="date"
              placeholder="Pick a date"
          />
        </Field>
        <Field id="category" label="Category">
          <Select
              v-model="addTransactionForm.category_id"
              type="text"
              placeholder="Pick category"
              :options="options"
          />
        </Field>
        <Field id="amount" label="Amount">
          <Input
              v-model="addTransactionForm.amount"
              type="number"
              placeholder="0.001"
          />
        </Field>
        <Button type="submit" class="button-primary" text="Add New Transaction" style="width: 100%;"/>
      </form>
    </Modal>
    <Suspense>
      <TransactionsList/>
      <template #fallback>
        <Loader class="loading"/>
      </template>
    </Suspense>
  </main>
</template>

<style scoped>
main {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-200);
}

.loading.loader {
  height: 100px;
  width: 100px;
  margin: auto;
  border-top: 8px solid var(--clr-grey-900);
}

.model-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>