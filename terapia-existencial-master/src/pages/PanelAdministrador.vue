<script>
import PanelAdminNav from "../components/PanelAdminNav.vue";
import Loader from "../components/Loader.vue";
import { getServicesData, deleteServiceByID } from "../services/service";

export default {
  name: "PanelAdministrador",
  components: { Loader, PanelAdminNav },
  data() {
    return {
      modalVisible: false,
      panelLoading: true,
      services: [],
      selectedService: null,
    };
  },
  async mounted() {
    this.services = await getServicesData();
    this.panelLoading = false;
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
    async deleteService(id) {
      const deleted = await deleteServiceByID(id);
      if (deleted) {
        this.services = this.services.filter((service) => service.id !== id);
      }
    },
  },
};
</script>
<template>
  <div class="panel-page">
    <h1 class="h1">Panel Administrador</h1>

    <PanelAdminNav />

    <Loader v-if="panelLoading" />
    <template v-else>
      <div class="">
        <table class="table">
          <thead>
            <tr>
              <th class="">Servicio</th>
              <th class="">Tiempo</th>
              <th class="">Modalidad</th>
              <th class="">Precio</th>
              <th class="">Acciones</th>
            </tr>
          </thead>
          <template v-for="service in services" :key="service.id">
            <tbody>
              <tr>
                <td class="grey-bg">{{ service.name }}</td>
                <td class="grey-bg">{{ service.time }}</td>
                <td class="grey-bg">{{ service.modality }}</td>
                <td class="grey-bg">${{ service.price }}</td>
                <td class="grey-bg">
                  <div class="">
                    <button
                      type="button"
                      class="btn btn-danger"
                      @click="showModal(service)"
                    >
                      Eliminar
                    </button>
                    <!-- Modal-->
                    <div
                      v-if="modalVisible && selectedService === service"
                      class="modal"
                    >
                      <div class="modal-content">
                        <h2>Eliminar: {{ service.name }}</h2>
                        <p>¿Estás seguro que queres eliminar este servicio?</p>
                        <button @click="closeModal" class="btn-close">
                          Cerrar
                        </button>
                        <button
                          class="btn-danger"
                          @click="deleteService(service.id)"
                        >
                          Si, estoy seguro
                        </button>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </template>
        </table>
      </div>
    </template>
  </div>
</template>
