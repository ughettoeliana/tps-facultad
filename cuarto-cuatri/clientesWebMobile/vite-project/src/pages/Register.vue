<script>
import BaseButton from '../components/BaseButton.vue';
import BaseInput from '../components/BaseInput.vue';
import BaseLabel from '../components/BaseLabel.vue';

export default {
    name: 'Register',
    components: { BaseButton, BaseLabel, BaseInput }
}
</script>
<template>
  <h1 class="text-3xl font-bold">Crear una cuenta de DV Chat</h1>
  <form action="#">
    <div>
      <BaseLabel for="email">Email</BaseLabel>
      <BaseInput></BaseInput>
    </div>
    <div>
      <BaseLabel for="password">Contraseña</BaseLabel>
      <BaseInput type="password"></BaseInput>
    </div>
   <BaseButton>Crear Cuenta</BaseButton>
  </form>
</template>
