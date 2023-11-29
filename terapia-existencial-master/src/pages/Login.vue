<script>
import BaseButton from "../components/BaseButton.vue";
import BaseInput from "../components/BaseInput.vue";
import BaseLabel from "../components/BaseLabel.vue";
import { login } from "../services/auth";

export default {
  name: "Login",
  components: { BaseButton, BaseLabel, BaseInput },
  emits: ["logged"],
  data() {
    return {
      loginLoading: false,
      form: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    doLogin() {
      this.loginLoading = true;
      login({
        ...this.form,
      })
        .then((user) => {
          this.$emit("logged", { ...user });
        })
        .finally(() => {
          this.loginLoading = false;
          this.$router.push("/servicios");
        });
    },
  },
};
</script>
<template>
  <div class="login-container">
    <h1 class="h1">Login</h1>
    <div class="form-container">
      <form action="#" @submit.prevent="doLogin" class="form">
        <div class="form-group">
          <BaseLabel for="email">Email</BaseLabel>
          <BaseInput
            id="email"
            name="email"
            type="email"
            v-model="form.email"
            :disabled="loginLoading"
          />
        </div>
        <div class="form-group">
          <BaseLabel for="password">Contraseña</BaseLabel>
          <BaseInput
            id="password"
            name="password"
            type="password"
            v-model="form.password"
            :disabled="loginLoading"
          />
        </div>
        <div class="form-group">
          <BaseButton :loading="loginLoading"
            >Iniciar Sesion</BaseButton
          >
        </div>
      </form>
    </div>
  </div>
</template>
