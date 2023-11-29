<script>
import BaseButton from "../components/BaseButton.vue";
import BaseLabel from "../components/BaseLabel.vue";
import BaseInput from "../components/BaseInput.vue";
import BaseTextarea from "../components/BaseTextarea.vue";
import Loader from "../components/Loader.vue";
import PanelAdminNav from "../components/PanelAdminNav.vue";
import { getUsers } from "../services/user";

export default {
  name: "Chats",
  components: {
    BaseButton,
    BaseLabel,
    BaseInput,
    BaseTextarea,
    Loader,
    PanelAdminNav,
  },
  data() {
    return {
      chatsLoading: true,
      users: [],
      filteredUsers: [],
    };
  },
  methods: {
    async getUsers() {
      this.users = await getUsers();
      this.updateFilteredUsers();
      this.chatsLoading = false;
    },

    updateFilteredUsers() {
      this.filteredUsers = this.filteredUsersList;
    },
  },

  async mounted() {
    this.getUsers();
  },

  computed: {
    filteredUsersList() {
      return this.users.filter(user => user.rol === 'user');
    }
  }
};
</script>

<template>
  <h1 class="h1">Usuarios</h1>
  <PanelAdminNav />
  <Loader v-if="chatsLoading" />
  <template v-else>
    <div class="blue-cards-container">
      <div class="">
        <div class="blue-card" v-for="user in filteredUsers" :key="user.id">
          <div class="">
            <router-link
              :to="`/usuario/${user.id}`"
              class="mr-2 dark-blue-text link-underline bold-text"
              >{{ user.email }}</router-link
            >
            <router-link :to="`/usuario/${user.id}/chat`" class="btn-primary"
              >Ir al chat</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </template>
</template>
