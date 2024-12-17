<script setup>
import Menu from "@/components/menu/Menu.vue";
import ModelHeader from "@/components/models/ModelHeader.vue";
import TransactionsList from "@/components/models/transactions/TransactionsList.vue";
import Loader from "@/components/buttons/Loader.vue";
</script>

<template>
  <Menu/>
  <main>
    <ModelHeader headerText="Transactions" buttonText="+ Add New Transaction"/>
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
</style>