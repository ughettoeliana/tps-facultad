<script>
import BaseButton from "../components/BaseButton.vue";
import BaseInput from "../components/BaseInput.vue";
import BaseLabel from "../components/BaseLabel.vue";
import { register } from "../services/auth";

export default {
  name: "Register",
  components: { BaseButton, BaseLabel, BaseInput },
  data() {
    return {
      registerLoding: false,
      newUser: {
        email: "",
        password: "",
      },
    };
  },

  methods: {
    async handleRegister() {
      this.registerLoding = true;
      try {
        await register({ ...this.newUser });
        this.$router.push("/servicios");
      } catch (error) {
        console.log(error);
      }
      this.registerLoding = false;
    },
  },
};
</script>
<template>
  <div class="login-container">
    <h1 class="h1">Registrarse</h1>
    <form action="#" @submit.prevent="handleRegister" class="form">
      <div class="form-group">
        <BaseLabel for="email">Email</BaseLabel>
        <BaseInput
          id="email"
          name="email"
          type="text"
          v-model="newUser.email"
          :disabled="registerLoding"
        ></BaseInput>
      </div>
      <div class="form-group">
        <BaseLabel for="password" class="">Contraseña</BaseLabel>
        <BaseInput
          id="password"
          name="password"
          type="password"
          v-model="newUser.password"
          :disabled="registerLoding"
        >
        </BaseInput>
      </div>
      <div class="form-group">
        <BaseButton :loading="registerLoding" >Crear Cuenta</BaseButton>
      </div>
    </form>
  </div>
</template>
