<script>
import Loader from "../components/Loader.vue";
import { getUserProfileById } from "../services/user";

export default {
  name: "UserProfile",
  components: { Loader },
  data() {
    return {
      userLoding: true,
      user: {
        id: null,
        email: null,
        rol: null,
      },
      loggedUser: {},
    };
  },
  async mounted() {
    this.userLoding = true;
    this.loggedUser = await getUserProfileById(this.$route.params.id);
    this.userLoding = false;
  },
};
</script>
<template>
  <Loader v-if="userLoding" />
  <template v-else>
      <div class="main-user-info-container">
        <h1 class="h1">
          <i class="fa-solid fa-user" style="color: #21496b"></i> Perfil de
        </h1>
        <div class="">
          <div class="main-user-info">
            <p v-if="loggedUser.fullName">
              Nombre: <span class="bold-text"> {{ loggedUser.fullName }}</span>
            </p>
            <p v-if="loggedUser.bio">
              Biografía: <span class="bold-text">{{ loggedUser.bio }}</span>
            </p>
          </div>
          <div class="main-user-info">
            <p>
              Mail: <span class="bold-text">{{ loggedUser.email }}</span>
            </p>
            <p>
              Mi Rol: <span class="bold-text">{{ loggedUser.rol }}</span>
            </p>
          </div>
        </div>
        <router-link
          :to="`/usuario/${loggedUser.id}/chat`"
          class="btn-primary mr-2 mt-2"
          >Mensaje</router-link
        >
      </div>
  </template>
</template>
