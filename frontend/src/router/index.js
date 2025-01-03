import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from "@/views/LoginView.vue";
import RegisterView from "@/views/RegisterView.vue";
import TransactionsView from "@/views/TransactionsView.vue";
import NotFoundView from "@/views/NotFoundView.vue";
import BudgetsView from "@/views/BudgetsView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'dashboard',
      component: HomeView,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
    },
    {
      path: '/transactions',
      name: 'transactions',
      component: TransactionsView,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/budgets',
      name: 'budgets',
      component: BudgetsView,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/pots',
      name: 'pots',
      component: LoginView,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/recurring-bills',
      name: 'recurring',
      component: LoginView,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: NotFoundView,
    },
  ],
})

export default router
