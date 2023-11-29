<script>
import BaseInput from "../components/BaseInput.vue";
import BaseLabel from "../components/BaseLabel.vue";
import BaseNavLi from "../components/BaseNavLi.vue";
import BaseTextarea from "../components/BaseTextarea.vue";
import Loader from "../components/Loader.vue";
import { getUserProfileById, updateUserData } from "../services/user";
import { subscribeToAuth } from "../services/auth";

export default {
  name: "MyProfile",
  components: { Loader, BaseNavLi, BaseInput, BaseLabel, BaseTextarea },
  data() {
    return {
      userLoding: true,
      user: {
        id: null,
        email: null,
        rol: null,
      },
      loggedUser: {},
      editedUser: {
        fullName: "",
        bio: "",
      },
      editMode: false,
    };
  },
  methods: {
    toggleEditMode() {
      this.editMode = !this.editMode;
      if (this.editMode) {
        this.editedUser = { ...this.loggedUser };
      }
    },
    async handleUpdateUser() {
      const userId = this.loggedUser.id;
      updateUserData(userId, this.editedUser);
      this.loggedUser.fullName = this.editedUser.fullName;
      this.loggedUser.bio = this.editedUser.bio;
      this.editMode = false;
    },
  },
  mounted() {
    subscribeToAuth(async (user) => {
      this.user = { ...user };
      this.loggedUser = await getUserProfileById(this.user.id);
      this.userLoding = false;
    });
  },
};
</script>
<template>
  <Loader v-if="userLoding" />
  <template v-else>
    <div class="main-user-info-container">
      <h1 class="h1">
        Mi perfil <i class="fa-solid fa-user mx-2 my-profile-icon" style="color: #21496b"></i>
      </h1>
      <div class="">
        <div class="main-user-info">
          <p v-if="loggedUser.fullName">
            Nombre: <span class='bold-text'>{{ loggedUser.fullName }}</span>
          </p>
          <p v-if="loggedUser.bio">Biografía: <span class='bold-text'>{{ loggedUser.bio }}</span></p>
        </div>
        <div class="main-user-info">
          <p>
            Mail: <span class=""> <span class='bold-text'>{{ loggedUser.email }}</span></span>
          </p>
          <p>
            Mi Rol: <span class=""> <span class='bold-text'>{{ loggedUser.rol }}</span></span>
          </p>
        </div>
      </div>
      <button v-if="!editMode" class="btn-edit mb-2" @click="toggleEditMode">
        Editar mi perfil
      </button>

      <!-- Form de editar perfil del usuario -->
      <div v-if="editMode" class="edit-profile-modal">
        <form @submit.prevent="handleUpdateUser" class="edit-form mt-2">
          <div class="edit-form-group">
            <BaseLabel for="fullName">Nombre Completo</BaseLabel>
            <BaseInput
              class="edit-form-control"
              id="fullName"
              v-model="editedUser.fullName"
              placeholder="Nombre completo"
              required
            />
          </div>
          <div class="edit-form-group">
            <BaseLabel for="bio">Biografía</BaseLabel>
            <BaseTextarea
              class="edit-form-control"
              id="bio"
              v-model="editedUser.bio"
              placeholder="Biografía"
              required
            ></BaseTextarea>
          </div>
          <button editMode="false" class="btn-close mr-2" type="submit">
            Cerrar
          </button>
          <button class="mb-2 btn-primary" type="submit">Guardar</button>
        </form>
      </div>
      <div>
        <router-link
          :to="`/usuario/1zIiuPCeTDXCaWu1JBnZIozLDG53/chat`"
          class="btn-primary mt-2"
          v-if="!editMode"
        >
          Ir al chat con el admin
        </router-link>
      </div>
    </div>
  </template>
</template>
