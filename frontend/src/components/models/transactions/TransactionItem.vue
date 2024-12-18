<script setup>
import {formatPrice} from "@/service/helpers.js";

const props = defineProps({
  transaction: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <li class="transaction-item">
    <div class="transaction-name">{{ transaction.name }}</div>
    <div class="transaction-category">{{ transaction.category.name }}</div>
    <div class="transaction-amount"
         :class="{
      'positive': transaction.amount > 0
    }">
      {{ formatPrice(transaction.amount) }}
    </div>
    <div class="transaction-date">{{ transaction.date }}</div>
  </li>
</template>

<style scoped>
.transaction-item {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(2, 1fr);
  grid-row-gap: var(--spacing-25);
  font-size: var(--fs-87);
  color: var(--clr-grey-900);
  font-weight: var(--fw-400);

  @media screen and (min-width: 768px) {
    grid-template-rows: 1fr;
    grid-template-columns: repeat(6, minmax(0, 1fr));
    grid-column-gap: var(--spacing-200);
  }

  @media screen and (min-width: 1280px) {
    padding-left: var(--spacing-100);
    padding-right: var(--spacing-100);
  }

  & .transaction-name {
    font-weight: var(--fw-700);
    grid-column: 1 / span 2;

    @media screen and (min-width: 768px) {
      grid-column: 1 / span 3;
    }
  }

  & .transaction-category {
    font-size: var(--fs-75);
    color: var(--clr-grey-500);
    grid-column: 1 / span 2;
    grid-row: 2 / -1;

    @media screen and (min-width: 768px) {
      grid-column: 4 / 5;
      grid-row: unset;
      justify-self: stretch;
      text-align: left;
    }
  }

  & .transaction-amount {
    font-weight: var(--fw-700);
    justify-self: flex-end;

    @media screen and (min-width: 768px) {
      grid-column: 6 / -1;
      justify-self: stretch;
      text-align: right;
    }
  }

  & .transaction-amount.positive {
    color: var(--clr-green);
  }

  & .transaction-date {
    font-size: var(--fs-75);
    color: var(--clr-grey-500);
    justify-self: flex-end;

    @media screen and (min-width: 768px) {
      grid-column: 5 / 6;
      grid-row: 1 /1;
      justify-self: stretch;
      text-align: left;
    }
  }
}

.transaction-item:not(:last-child):after {
  content: '';
  height: 1px;
  width: 100%;
  background-color: var(--clr-grey-100);
  grid-column: 1 / -1;
  margin-top: calc(var(--spacing-100) - var(--spacing-25));
}
</style>