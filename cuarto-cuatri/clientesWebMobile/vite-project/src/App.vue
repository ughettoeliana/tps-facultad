<script>
import BaseButton from "./components/BaseButton.vue";
import Chat from "./pages/Chat.vue";
import { subscribeToAuth, logout } from "./services/auth";


export default {
  name: 'App',
  components: { Chat, BaseButton },
  data() {
    return {
      user: {
        id: null,
        email: null,
      }
    }
  },
  methods: {
    handleLogout() {
      logout()
    }
  },
  mounted() {
    subscribeToAuth(user => {
      console.log('nueva autenticacion:', user)
      this.user = { ...user };
    });
  },
};
</script>

<template>
  <header class="flex p-4">
    <nav class="flex items-center  justify-around">
      <div class="inline-block">
        <a href="/"><svg class="w-8 inline-block" width="85" height="85" viewBox="0 0 85 85" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0.700012 40.2C0.700012 40.2 23.2 20.9 40.2 41.5C40.2 41.5 14.5 61.3 0.700012 40.2Z"
              fill="url(#paint0_linear_1_3)" stroke="#6AB2E8" stroke-miterlimit="10" />
            <path d="M83.4 43.1C83.4 43.1 61.2 62.7 43.9 42.4C43.9 42.4 69.3 22.2 83.4 43.1Z"
              fill="url(#paint1_linear_1_3)" stroke="#6AB2E8" stroke-miterlimit="10" />
            <path d="M43.9 83.5C43.9 83.5 22.6 63 41.4 44.1C41.4 44.1 63.6 67.8 43.9 83.5Z" fill="url(#paint2_linear_1_3)"
              stroke="#6AB2E8" stroke-miterlimit="10" />
            <path d="M42.4 0.699997C42.4 0.699997 62.4 22.5 42.4 40.2C42.4 40.2 21.8 15.1 42.4 0.699997Z"
              fill="url(#paint3_linear_1_3)" stroke="#6AB2E8" stroke-miterlimit="10" />
            <defs>
              <linearGradient id="paint0_linear_1_3" x1="0.618101" y1="40.3373" x2="40.0964" y2="41.6469"
                gradientUnits="userSpaceOnUse">
                <stop offset="0.2" stop-color="white" />
                <stop offset="0.6" stop-color="#6AB2E8" />
              </linearGradient>
              <linearGradient id="paint1_linear_1_3" x1="83.352" y1="42.9299" x2="43.858" y2="42.2405"
                gradientUnits="userSpaceOnUse">
                <stop offset="0.2" stop-color="white" />
                <stop offset="0.6" stop-color="#6AB2E8" />
              </linearGradient>
              <linearGradient id="paint2_linear_1_3" x1="44.0847" y1="83.4245" x2="41.6107" y2="44.1022"
                gradientUnits="userSpaceOnUse">
                <stop offset="0.2" stop-color="white" />
                <stop offset="0.6" stop-color="#6AB2E8" />
              </linearGradient>
              <linearGradient id="paint3_linear_1_3" x1="42.2" y1="0.699997" x2="42.2" y2="40.2"
                gradientUnits="userSpaceOnUse">
                <stop offset="0.2" stop-color="white" />
                <stop offset="0.6" stop-color="#6AB2E8" />
              </linearGradient>
            </defs>
          </svg>
        </a>
        <h1>
          <a href="/" class="text 2xl">Terapia Existencial</a>
        </h1>
      </div>
      <ul class="flex justify-star gap-4">
        <li>
          <router-link to="/quienes-somos">Acerca de nosotros</router-link>
        </li>
        <template v-if="user.id === null">
          <li>
            <router-link to="/iniciar-sesion"
              class="p-2 rounded-lg bg-custom-blue md:border-2 hover:border-custom-blue text-white">Iniciar
              sesion</router-link>
          </li>
          <li>
            <router-link to="/registro"
              class="p-2 rounded-lg border-custom-blue md:border-2 hover:bg-custom-blue hover:text-white">Registro</router-link>
          </li>
        </template>
        <template v-else>
          <li>
            <router-link to="/chat">Chat</router-link>
          </li>
          <li>
            <router-link to="/perfil">Mi Perfil</router-link>
          </li>
          <li>
            <form action="#" @submit.prevent="handleLogout">
              <button class="btn text-primary"><strong>{{ user.email }}</strong> Cerrar Sesion</button>
            </form>
          </li>
        </template>
      </ul>
    </nav>
  </header>
  <div class="container h-full m-auto p-4">
    <router-view>
    </router-view>
  </div>
  <footer class="flex items-center text-gray-700 justify-around">
    <ul>
      <li><a>Product</a></li>
      <li><a>Features</a></li>
      <li><a>Learn</a></li>
      <li><a>Plugins</a></li>
    </ul>
    <ul>
      <li><a>Templates</a></li>
      <li><a>Blog</a></li>
      <li><a>Personal</a></li>
      <li><a>Startup</a></li>
    </ul>
    <ul>
      <li><a>Resources</a></li>
      <li><a>Updates</a></li>
      <li><a>Community</a></li>
      <li><a>Contact</a></li>
    </ul>
  </footer>
</template>
