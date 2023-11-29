<script>
import BaseNavLi from './BaseNavLi.vue';

export default {
  name: "PanelAdminNav",
  components: { BaseNavLi },
};
</script>

<template>
  <div class="navbar">
    <ul class="nav">
      <BaseNavLi
        ><router-link
          to="/panel"
          class="grey-text"
          >Servicios</router-link
        >
      </BaseNavLi>
      <BaseNavLi
        ><router-link
          to="/create-service"
          class="grey-text"
          >Crear un nuevo servicio</router-link
        >
      </BaseNavLi>
      <BaseNavLi>
        <router-link
          to="/users-list"
          class="grey-text"
          >Chats</router-link
        >
      </BaseNavLi>
    </ul>
  </div>
</template>
