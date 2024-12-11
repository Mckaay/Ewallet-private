<script setup>
import MenuItem from "@/components/menu/MenuItem.vue";
import HouseIcon from "@/components/icons/HouseIcon.vue";
import ArrowsDownUpIcon from "@/components/icons/ArrowsDownUpIcon.vue";
import ChartDonutIcon from "@/components/icons/ChartDonutIcon.vue";
import JarFillIcon from "@/components/icons/JarFillIcon.vue";
import ReceiptIcon from "@/components/icons/ReceiptIcon.vue";
import MenuToggleButton from "@/components/menu/MenuToggleButton.vue";
import {ref} from "vue";
import BigLogoIcon from "@/components/icons/BigLogoIcon.vue";
import SmallLogoIcon from "@/components/icons/SmallLogoIcon.vue";

const narrow = ref(true);
</script>

<template>
  <nav class="menu" :class="{ 'narrowed': narrow}">
    <div class="logo">
      <BigLogoIcon v-if="!narrow"/>
      <SmallLogoIcon v-else class="small-logo"/>
    </div>
    <ul>
      <MenuItem text="Overview" routeName="home">
        <HouseIcon/>
      </MenuItem>
      <MenuItem text="Transactions" routeName="transactions">
        <ArrowsDownUpIcon/>
      </MenuItem>
      <MenuItem text="Budgets" routeName="budgets">
        <ChartDonutIcon/>
      </MenuItem>
      <MenuItem text="Pots" routeName="pots">
        <JarFillIcon/>
      </MenuItem>
      <MenuItem text="Recurring bills" routeName="recurring">
        <ReceiptIcon/>
      </MenuItem>
    </ul>
    <MenuToggleButton @click="narrow = !narrow" text="Minimize Menu"/>
  </nav>
</template>

<style>
.menu {
  --narrow-menu-width: 88px;
  --extended-menu-width: 300px;

  position: fixed;
  bottom: 0;
  font-size: var(--fs-80);
  color: var(--clr-grey-300);
  background-color: var(--clr-grey-900);
  padding: var(--spacing-50) var(--spacing-100) 0 var(--spacing-100);
  width: 100%;
  transition-property: width;
  transition-duration: 50ms;

  @media screen and (min-width: 768px) {
    padding: var(--spacing-50) var(--spacing-250) 0 var(--spacing-250);
  }

  @media screen and (min-width: 1280px) {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-150);
    position: static;
    padding: 0;
    width: var(--extended-menu-width);
    font-size: var(--fs-100);
  }

  & .logo {
    display: none;
    padding: var(--spacing-250) var(--spacing-200);

    @media screen and (min-width: 1280px) {
      display: block;
    }
  }

  & ul {
    display: flex;
    align-items: center;
    justify-content: space-between;
    list-style: none;
    padding: 0;

    @media screen and (min-width: 768px) {
      max-width: 800px;
      margin: auto;
    }

    @media screen and (min-width: 1280px) {
      max-width: unset;
      flex-direction: column;
      align-items: flex-start;
      gap: var(--spacing-25);
      padding-right: var(--spacing-150);
      margin: unset;
    }
  }

  .menu-item:hover {
    cursor: pointer;
    color: var(--clr-white);

    & svg > * {
      fill: var(--clr-white);
    }
  }
}

.menu:has(.router-link-active) {
  & .router-link-active {
    background-color: var(--clr-white);
    color: var(--clr-grey-900);
    box-shadow: 4px 0 0 var(--clr-green) inset;
    border-radius: 0 var(--spacing-50) var(--spacing-50) 0;

    .menu-item:hover {
      cursor: unset;
      color: var(--clr-grey-900);
    }

    & svg > * {
      fill: var(--clr-green);
    }
  }
}

a {
  all: unset;
  width: 100%;
}

.menu.narrowed {
  width: var(--narrow-menu-width);

  .menu-item-text, .toggle-button {
    display: none;
  }

  & ul {
    padding: 0;

    & li {
      padding: var(--spacing-100) var(--spacing-200) var(--spacing-100) var(--spacing-200);
      justify-content: center;
    }
  }

  .arrow-fat {
    transform: rotateY(-180deg);
  }
}
</style>