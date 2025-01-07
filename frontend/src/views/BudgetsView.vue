<script setup>
import Menu from "@/components/menu/Menu.vue";
import Button from "@/components/buttons/Button.vue";
import Field from "@/components/forms/Field.vue";
import Input from "@/components/forms/Input.vue";
import Select from "@/components/forms/Select.vue";
import Modal from "@/components/modals/Modal.vue";
import {computed, onMounted, reactive, ref} from "vue";
import {useCategories} from "@/composables/categories.js";
import {useThemes} from "@/composables/themes.js";
import {useBudgets} from "@/composables/budgets.js";

const modal = ref(null);

const openModal = () => {
  modal.value.openModal();
}

const categoriesService = useCategories();
const themesService = useThemes();
const budgetsService = useBudgets();

onMounted(async () => {
  await categoriesService.fetchAvailableCategoriesForBudget();
  await themesService.fetchAvailableThemesForBudget();
  await budgetsService.fetchBudgetsData();
})

const categoryOptions = computed(() => {
  return Object.entries(categoriesService.availableCategoriesForBudget.value).map(([key, value]) => ({
    value: value.id,
    label: value.name,
    disabled: value.disabled,
  }));
});

const themesOptions = computed(() => {
  return Object.entries(themesService.availableThemesForBudget.value).map(([key,value]) => ({
    value: value.id,
    label: value.name,
    disabled: value.disabled
  }))
})

const addBudgetForm = reactive( {
  'category_id': '',
  'limit': '',
  'theme_id': '',
});

const saveBudget = async () => {
  await budgetsService.saveBudget({ ...addBudgetForm })
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
              min="0"
              step="1"
              placeholder="e.g.2000"
          />
        </Field>
        <Field id="category" label="Budget Category">
          <Select
              v-model="addBudgetForm.category_id"
              type="text"
              placeholder="Pick Category"
              :options="categoryOptions"
          />
        </Field>
        <Field id="theme" label="Theme">
          <Select
              v-model="addBudgetForm.theme_id"
              type="text"
              placeholder="Pick Theme"
              :options="themesOptions"
          />
        </Field>
        <Button type="submit" class="button-primary" text="Add New Budget" style="width: 100%;"/>
      </form>
    </Modal>
    {{ budgetsService.budgetList }}
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