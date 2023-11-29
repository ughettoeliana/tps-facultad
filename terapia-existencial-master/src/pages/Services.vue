<script>
import BaseButton from "../components/BaseButton.vue";
import BaseInput from "../components/BaseInput.vue";
import BaseLabel from "../components/BaseLabel.vue";
import BaseNavLi from "../components/BaseNavLi.vue";
import Loader from "../components/Loader.vue";
import { getServicesData, hireService } from "../services/service";
import { subscribeToAuth } from "../services/auth";
import { getUserProfileById } from "../services/user";

export default {
  name: "Services",
  components: { BaseButton, BaseLabel, BaseInput, BaseNavLi, Loader },
  data() {
    return {
      modalVisible: false,
      servicesLoading: true,
      services: [],
      selectedService: null,
      loggedUser: {},
      user: {
        id: null,
        email: null,
      },
    };
  },
  methods: {
    showModal(service) {
      this.selectedService = service;
      this.modalVisible = true;
    },
    closeModal() {
      this.modalVisible = false;
      this.selectedService = null;
    },
    async handleScheduleAppointment(service) {
      this.selectedService = service;
      const userId = this.loggedUser.id;
      console.log("serviceId", this.selectedService.id);
      console.log("userId", userId);
      const success = await hireService(this.selectedService.id, userId);
      console.log("success", success);

      if (success) {
        console.log("se constrato el servicio con exito");
      } else {
        console.log("hubo un error");
      }
    },
  },
  async mounted() {
    this.services = await getServicesData();
    this.servicesLoading = false;
    subscribeToAuth(async (user) => {
      this.user = { ...user };
      this.loggedUser = await getUserProfileById(this.user.id);
      this.userLoding = false;
    });
  },
};
</script>

<template>
  <Loader v-if="servicesLoading" />
  <template v-else>
    <div class="service-page">
      <h1 class="h1">Servicios</h1>
      <div class="cards-container">
        <div class="card" v-for="service in services" :key="service.id">
          <div class="card-body">
            <h2 class="dark-blue-text">{{ service.name }}</h2>
            <p>
              <i class="fa-solid fa-clock" style="color: #21496b"></i>
              {{ service.time }}
            </p>
            <p>$ {{ service.price }}</p>
            <p class="card-text">
              Agenda una sesion con el consultor Daniel del Valle
            </p>
            <BaseButton @click="handleScheduleAppointment(service)" class="btn"
              >Agendar Cita</BaseButton
            >
          </div>

          <div v-if="modalVisible && selectedService === service" class="modal">
            <div class="modal-content">
              <h2>Agendaste la cita: {{ service.name }}</h2>
              <p>
                Gracias, en breve nos estaremos comunicando con usted para
                agendar el horario
              </p>
              <button @click="closeModal" class="btn-close">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
</template>
