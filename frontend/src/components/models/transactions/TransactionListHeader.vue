<script setup>

</script>

<template>
  <section class="transactions-header">
    <div class="transaction-name">Recipient / Sender</div>
    <div class="transaction-category">Category</div>
    <div class="transaction-amount">Transaction Date</div>
    <div class="transaction-date">Amount</div>
  </section>
</template>

<style scoped>
.transactions-header {
  display: none;
  font-size: var(--fs-75);
  color: var(--clr-grey-500);
  grid-template-rows: 1fr;
  grid-template-columns: repeat(6, 1fr);
  padding: var(--spacing-75) 0;
  grid-column-gap: var(--spacing-200);
  border-bottom: 1px solid var(--clr-grey-100);

  & .transaction-name {
    grid-column: 1 / span 3;
  }

  & .transaction-date {
    text-align: right;
  }

  @media screen and (min-width: 768px) {
    display: grid;
  }

  @media screen and (min-width: 1280px) {
    padding-left: var(--spacing-100);
    padding-right: var(--spacing-100);
  }
}
</style>