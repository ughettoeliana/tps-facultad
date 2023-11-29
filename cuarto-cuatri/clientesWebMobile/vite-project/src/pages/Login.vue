<script>
import BaseButton from '../components/BaseButton.vue';
import BaseInput from '../components/BaseInput.vue';
import BaseLabel from '../components/BaseLabel.vue';
import { login } from '../services/auth';

export default {
  name: 'Login',
  components: { BaseButton, BaseLabel, BaseInput },
  emits: ['logged'],
  data() {
    return{
      loginLoading: false,
      form: {
        email: '',
        password: '',
      }
    }
  },
  methods: {
    doLogin(){
      this.loginLoading = true;
     login({
      ...this.form,
     })
     .then(user => {
      this.$emit('logged', {...user});
     })
     .finally(()=>{
      this.loginLoading = false;
     })
    }
  }
}
</script>
<template>
  <h1 class="text-3xl font-bold">Ingresar a mi cuenta</h1>
  <form action="#"
  @submit.prevent="doLogin">
    <div>
      <BaseLabel for="email">Email</BaseLabel>
      <BaseInput id="email" name="email" type="email" v-model="form.email" />
    </div>
    <div>
      <BaseLabel for="password">Contraseña</BaseLabel>
      <BaseInput id="password" name="password" type="password"  v-model="form.password"/>
    </div>
    <BaseButton>Iniciar Sesion</BaseButton>
  </form>
</template>
