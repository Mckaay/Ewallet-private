<script setup>
import {ref} from "vue";
import Field from "@/components/forms/Field.vue";
import Input from "@/components/forms/Input.vue";
import Button from "@/components/buttons/Button.vue";
import {useAuthStore} from "@/stores/auth.js";
import ErrorMessage from "@/components/forms/ErrorMessage.vue";

const form = ref({
  email: "",
  password: "",
});

const authStore = useAuthStore();

const onSubmit = () => {
  console.log(form.value.email);
  authStore.login(form.value.email, form.value.password);
};
</script>

<template>
  <header class="top-logo">
    <svg xmlns="http://www.w3.org/2000/svg" width="122" height="22" viewBox="0 0 122 22" fill="none">
      <path
          d="M8.192 21.44H2.176V10.24H0V5.312H2.304C2.944 2.272 5.92 0 11.2 0H12.48V4.288H10.24C8.576 4.288 7.776 4.448 7.808 5.312H12.48V10.24H8.192V21.44Z"
          fill="white"/>
      <path d="M20.1047 3.84H14.0887V0H20.1047V3.84ZM20.1047 21.44H14.0887V5.312H20.1047V21.44Z" fill="white"/>
      <path
          d="M28.3622 21.44H22.3462V5.312H27.9783V10.208H28.2983C28.6502 7.52 30.4103 4.992 34.7303 4.992C39.0823 4.992 41.1302 7.616 41.1302 11.104V21.44H35.1143V13.312C35.1143 11.072 34.2822 10.368 31.6582 10.368C29.0022 10.368 28.3622 11.04 28.3622 13.12V21.44Z"
          fill="white"/>
      <path
          d="M48.4447 21.76C44.7967 21.76 42.7487 20.096 42.7487 17.344C42.7487 15.072 44.3167 13.44 47.9647 13.088L54.5247 12.448V12.128C54.5247 10.496 53.8208 10.24 51.6768 10.24C49.6927 10.24 49.0848 10.624 49.0848 11.968V12.096H43.0687V12.032C43.0687 7.744 46.6527 4.992 52.1247 4.992C57.7567 4.992 60.4767 7.744 60.4767 12.256V21.44H54.8447V18.048H54.5247C53.9167 20.32 51.9327 21.76 48.4447 21.76ZM48.7967 16.96C48.7967 17.472 49.3087 17.568 50.2367 17.568C53.1487 17.568 54.3327 17.216 54.4927 15.776L49.5648 16.352C49.0208 16.416 48.7967 16.608 48.7967 16.96Z"
          fill="white"/>
      <path
          d="M68.596 21.44H62.58V5.312H68.212V10.208H68.532C68.884 7.52 70.644 4.992 74.964 4.992C79.316 4.992 81.364 7.616 81.364 11.104V21.44H75.348V13.312C75.348 11.072 74.516 10.368 71.892 10.368C69.236 10.368 68.596 11.04 68.596 13.12V21.44Z"
          fill="white"/>
      <path
          d="M92.5185 21.76C86.7905 21.76 83.1425 18.592 83.1425 13.376C83.1425 8.128 86.7905 4.992 92.5185 4.992C98.0225 4.992 101.542 7.808 101.542 12.128V12.64H95.5585V12.384C95.5585 10.72 94.3425 10.368 92.3905 10.368C90.1825 10.368 89.1265 10.848 89.1265 13.376C89.1265 15.872 90.1825 16.352 92.3905 16.352C94.3425 16.352 95.5585 16.032 95.5585 14.368V14.08H101.542V14.624C101.542 18.912 98.0225 21.76 92.5185 21.76Z"
          fill="white"/>
      <path
          d="M112.462 21.76C106.99 21.76 103.15 19.424 103.15 13.376C103.15 8.128 106.958 4.992 112.334 4.992C117.902 4.992 121.454 7.776 121.454 12.96C121.454 13.504 121.422 13.92 121.358 14.496H108.718C108.814 16.448 109.678 16.992 112.238 16.992C114.67 16.992 115.31 16.576 115.31 15.616V15.264H121.326V15.648C121.326 19.232 117.902 21.76 112.462 21.76ZM112.206 9.6C109.998 9.6 109.07 10.08 108.814 11.456H115.63C115.406 10.08 114.446 9.6 112.206 9.6Z"
          fill="white"/>
    </svg>
  </header>

  <main class="form-wrapper">
    <div class="img-logo">
      <h1>Keep track of your money and save for your future</h1>
      <p>Personal finance app puts you in control of your spending. Track transactions, set budgets, and add to savings
        pots easily.</p>
    </div>

    <form class="auth-form" @submit.prevent="onSubmit">
      <h1>Login</h1>
      <div class="auth-fields-wrapper">
        <Field label="Email" id="email">
          <Input v-model="form.email" type="email" placeholder="Enter your email" required/>
        </Field>
        <Field label="Password" id="password">
          <Input v-model="form.password" type="password" placeholder="Enter your password" required/>
        </Field>
      </div>

      <Button class="button-primary" type="submit" text="Login"/>
      <ErrorMessage v-if="authStore.errorMessage">
        {{ authStore.errorMessage }}
      </ErrorMessage>
      <div class="signup-link-wrapper">
        Need to create an account?
        <RouterLink class="register-link" :to="{ name: 'register'}">Sign up</RouterLink>
      </div>
    </form>
  </main>
</template>

<style>
.top-logo {
  background-color: var(--clr-grey-900);
  padding: var(--spacing-150) var(--spacing-250);
  border-radius: 0 0 var(--spacing-50) var(--spacing-50);
  display: grid;
  place-items: center;
  height: 70px;

  @media screen and (min-width: 1280px) {
    display: none;
  }
}

.form-wrapper {
  height: calc(100% - 70px);
  display: grid;
  place-items: center;

  @media screen and (min-width: 1280px) {
    align-items: center;
    grid-template-columns: 600px 1fr;
    height: 100%;
    justify-items: center;
    max-width: 1440px;
    margin: auto;
    gap: var(--spacing-700);
  }

  & h1 {
    line-height: 120%;
  }

  & .img-logo {
    display: none;
    min-width: 560px;
    height: 920px;
    color: var(--clr-white);
    background-image: url('../assets/images/welcome-image.png');
    background-size: 600px;
    background-repeat: no-repeat;
    padding: var(--spacing-250);
    border-radius: var(--spacing-75);

    & p {
      margin-top: var(--spacing-150);
      font-size: var(--fs-87);
    }

    @media screen and (min-width: 1280px) {
      display: flex;
      flex-direction: column;
      justify-content: flex-end;

      & svg {
        margin-bottom: auto;
      }
    }
  }

  & form {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-200);
    max-width: 600px;
    width: 88%;
    padding: var(--spacing-150) var(--spacing-125);
    background-color: var(--clr-white);
    border-radius: var(--spacing-75);

    @media screen and (min-width: 768px) {
      padding: var(--spacing-200);
    }

    @media screen and (min-width: 1280px) {
      justify-self: flex-start;
    }
  }

  & .auth-fields-wrapper {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-100);
  }

  & .signup-link-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: var(--spacing-50);
    font-size: var(--fs-87);
    color: var(--clr-grey-500);
  }

  & a {
    font-weight: var(--fw-700);
    display: block;
    color: var(--clr-grey-900);
    text-decoration: underline;
    text-underline-offset: 3px;
    line-height: 150%;
  }
}
</style>
