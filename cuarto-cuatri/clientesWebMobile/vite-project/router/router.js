import Home from './../src/pages/Home.vue';
import About from './../src/pages/About.vue';
import Chat from './../src/pages/Chat.vue';
import Register from './../src/pages/Register.vue';
import Login from './../src/pages/Login.vue';
import Profile from './../src/pages/Profile.vue';
import { createRouter, createWebHistory } from 'vue-router';
import { subscribeToAuth } from '../src/services/auth';

const routes =[
  {path: '/',       component: Home},
  {path: '/quienes-somos',       component: About},
  {path: '/iniciar-sesion',       component: Login},
  {path: '/registro',       component: Register},
  {path: '/chat',       component: Chat,       meta: { requiresAuth: true }, },
  {path: '/perfil',       component: Profile,  meta: { requiresAuth: true }, },
];

const router = createRouter({
  routes, 
  history: createWebHistory(),
})

let user = {
  id: null,
  email: null,
}

subscribeToAuth(newUser => user = newUser);

router.beforeEach((to) => {
  if (user.id === null && to.meta.requiresAuth) {
    return '/iniciar-sesion';
  }
});

export default router;