<script>
import BaseButton from "../components/BaseButton.vue";
import BaseInput from "../components/BaseInput.vue";
import BaseLabel from "../components/BaseLabel.vue";
import BaseNavLi from "../components/BaseNavLi.vue";
import PanelAdminNav from "../components/PanelAdminNav.vue";
import { newService } from "../services/service";

export default {
  name: "CreateNewService",
  components: { BaseButton, BaseLabel, BaseInput, BaseNavLi, PanelAdminNav },
  data() {
    return {
      createServiceLoading: false,
      form: {
        name: "",
        time: "",
        modality: "",
        price: "",
      },
    };
  },
  methods: {
    async handleCreateNewService() {
      this.createServiceLoading = true;
      try {
        await newService({ ...this.form });
        this.$router.push("/panel");
      } catch (error) {
        console.log(error);
      }
      this.createServiceLoading = false;
    },
  },
};
</script>
<template>
  <div class="create-new-service-page">
    <h1 class="h1">Crear un nuevo servicio</h1>
    <PanelAdminNav />

    <div class="form">
      <form action="#" @submit.prevent="handleCreateNewService" class="form">
        <div class="form-group">
          <BaseLabel for="name">Nombre</BaseLabel>
          <BaseInput
            id="name"
            name="name"
            type="text"
            v-model="form.name"
            :disabled="createServiceLoading"
            required
          />
        </div>
        <div class="d-flex">
          <div class="form-group">
            <BaseLabel for="time">Tiempo</BaseLabel>
            <BaseInput
              id="time"
              name="time"
              type="time"
              v-model="form.time"
              :disabled="createServiceLoading"
              required
            />
          </div>
          <div class="form-group">
            <BaseLabel for="price">Precio</BaseLabel>
            <BaseInput
              class="price-input"
              id="price"
              name="price"
              type="number"
              v-model="form.price"
              :disabled="createServiceLoading"
              required
            />
          </div>
        </div>
        <div class="form-group">
          <p>Modalidad</p>
          <div class="">
            <input
              class=""
              type="radio"
              name="modality"
              id="virtual"
              value="Virtual"
              v-model="form.modality"
            />
            <label class="" for="virtual"> Virtual </label>
          </div>
          <div class="">
            <input
              class=""
              type="radio"
              name="modality"
              id="presencial"
              value="Presencial"
              v-model="form.modality"
            />
            <label class="" for="presencial"> Presencial </label>
          </div>
          <p v-if="!form.modality" class="text-danger">
            Debes seleccionar al menos una opción.
          </p>
        </div>

        <BaseButton :loading="createServiceLoading" class="my-2"
          >Crear Servicio</BaseButton
        >
      </form>
    </div>
  </div>
</template>
