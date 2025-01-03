<script setup>
import Menu from "@/components/menu/Menu.vue";
import Button from "@/components/buttons/Button.vue";
import Field from "@/components/forms/Field.vue";
import Input from "@/components/forms/Input.vue";
import Select from "@/components/forms/Select.vue";
import Modal from "@/components/modals/Modal.vue";
import {computed, onMounted, reactive, ref} from "vue";
import {useCategories} from "@/composables/categories.js";
import {useTransactions} from "@/composables/transactions.js";

const modal = ref(null);

const openModal = () => {
  modal.value.openModal();
}

const categoriesService = useCategories();

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

const addBudgetForm = reactive( {
  'category_id': '',
  'limit': '',
  'theme_id': '',
});

const saveBudget = () => {
  console.log('Form submitted');
}
</script>

<template>
  <Menu/>
  <main>
    <header class="model-header">
      <h1>Budgets</h1>
      <Button @click="openModal" class="button-primary" text="+ Add New Budget"/>
    </header>
    <Modal
        ref="modal"
        modalHeader="Add New Budget"
        modalDescription="Choose a category to set a spending budget. These categories can help you monitor spending."
    >
      <form @submit.prevent="saveBudget">
        <Field id="limit" label="Maximum Spend">
          <Input
              v-model="addBudgetForm.limit"
              type="number"
              placeholder="e.g.2000"
          />
        </Field>
        <Field id="category" label="Budget Category">
          <Select
              v-model="addBudgetForm.category_id"
              type="text"
              placeholder="Pick Category"
              :options="options"
          />
        </Field>
        <Field id="theme" label="Theme">
          <Select
              v-model="addBudgetForm.theme_id"
              type="text"
              placeholder="Pick Theme"
              :options="options"
          />
        </Field>
        <Button type="submit" class="button-primary" text="Add New Budget" style="width: 100%;"/>
      </form>
    </Modal>
  </main>
</template>

<style scoped>
main {
  display: grid;
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